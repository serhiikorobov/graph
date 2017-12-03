<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 3:40 PM
 */

namespace frontend\controllers\member;


use common\models\member\source\visibility\Watcher;
use frontend\controllers\AuthController;
use frontend\models\member\Visibility;
use frontend\models\User;
use yii\filters\VerbFilter;
use yii;
use \frontend\models\member\visibility\View;

class VisibilityController extends AuthController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $watcherGroupId = Yii::$app->request->getQueryParam('watcher_group_id');
        if ($watcherGroupId && $watcherGroupId !== Watcher::ANONYMOUS) {
            $user = User::find()->where([
                'role' => User::ROLE_ADMIN,
                'id' => $watcherGroupId
            ])->one();

            if ($user) {
                $watcherGroupId = $user->id;
            } else {
                $watcherGroupId = null;
            }
        }

        if (!$watcherGroupId) {
            $watcherGroupId = Watcher::ANONYMOUS;
        }

        $visibilityQuery = Visibility::find();
        if ($watcherGroupId === Watcher::ANONYMOUS) {
            $visibilityQuery->where(['watcher_group_id' => null]);
        } else {
            $visibilityQuery->where(['watcher_group_id' => $watcherGroupId]);
        }

        $visible_group_ids = $visibilityQuery
            ->select('visible_group_id')
            ->createCommand()
            ->queryColumn();

        $viewModel = new View();
        $viewModel->watcher_group_id = $watcherGroupId;
        $viewModel->visible_group_ids = $visible_group_ids;
        $viewModel->prepareVisibleGroupIds();

        return $this->render('index', [
            'model' => $viewModel
        ]);
    }

    public function actionSave()
    {
        $viewModel = new View();
        if ($viewModel->load(Yii::$app->request->post())) {

            if ($viewModel->validate()) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    Visibility::deleteItemsByWatcherId($viewModel->watcher_group_id);
                    if ($viewModel->visible_group_ids) {

                        $currentWatcherIsAnonymous = $viewModel->watcher_group_id === Watcher::ANONYMOUS;
                        $anonymousVisibility = [];
                        if (!$currentWatcherIsAnonymous) {
                            $anonymousVisibility = Visibility::find()
                                ->select('visible_group_id')
                                ->where(['watcher_group_id' => null])
                                ->createCommand()
                                ->queryColumn();

                            $anonymousVisibility[] = $viewModel->watcher_group_id;
                        }

                        foreach ($viewModel->visible_group_ids as $visibleGroupId) {
                            if (in_array($visibleGroupId, $anonymousVisibility)) {
                                continue;
                            }

                            $visibility = new Visibility();

                            $data = [
                                'watcher_group_id' => $currentWatcherIsAnonymous ? null : $viewModel->watcher_group_id,
                                'visible_group_id' => $visibleGroupId
                            ];

                            $visibility->setAttributes($data);
                            if (!$visibility->save()) {
                                $viewModel->addErrors($visibility->getErrors());
                            }
                        }
                    }
                    $transaction->commit();
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        if (!$viewModel->hasErrors()) {
            return $this->redirect(['index', 'watcher_group_id' => $viewModel->watcher_group_id]);
        } else {
            return $this->render('index', [
                'model' => $viewModel
            ]);
        }
    }
}