<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/2/2017
 * Time: 12:00 PM
 */

namespace frontend\controllers;

use common\models\member\source\visibility\Watcher;
use frontend\models\dreamteam\Search;
use frontend\models\Member;
use frontend\models\member\Visibility;
use yii;
use yii\web\Controller;

class DreamteamController extends Controller
{
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['Search']['ids'] = $this->_getVisibleMemberIds();

        $searchModel = new Search();
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    private function _getVisibleMemberIds()
    {
        /* @var $user \frontend\models\User */
        $user = null;
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->getUser()->getIdentity();
        }

        $isSuperAdmin = $user && $user->isAdmin();

        $viewerIds = [];
        if (!$isSuperAdmin) {
            $visibilityQuery = Visibility::find()
                ->orWhere([
                    'watcher_group_id' => null
                ]);

            if ($user) {
                $visibilityQuery->orWhere([
                    'watcher_group_id' => $user->id
                ]);
            }

            $viewerIds = $visibilityQuery
                ->select('visible_group_id')
                ->createCommand()
                ->queryColumn();
            
            if ($user) {
                $viewerIds[] = $user->id;
            }
        }

        $memberIds = [];
        if ($viewerIds || $isSuperAdmin) {
            $memberQuery = Member::find()
                ->select('id');

            if (!$isSuperAdmin) {
                $memberQuery->andWhere(['user_id' => $viewerIds]);
            }

            $memberIds = $memberQuery->createCommand()
                ->queryColumn();
        }



        return $memberIds;
    }

}