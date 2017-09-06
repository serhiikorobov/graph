<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 3/15/17
 * Time: 9:34 AM
 */

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Venue;
use frontend\models\Product;
use frontend\models\SignupForm;
use frontend\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use frontend\models\Event;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $viewModel = new \frontend\models\site\Index();
        $viewModel->load(\yii::$app->request->get());
        $viewModel->validate();

        return $this->render('index', ['model' => $viewModel]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if (!User::isAdminExist() && $model->load(\Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (\Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                'model' => $model,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                    'model' => $model,
                ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionView()
    {
        $eventId = \Yii::$app->getRequest()->get('id');
        $type = \Yii::$app->getRequest()->get('type');
        switch ($type) {
            case 'product': {
                if ($eventId) {
                    if (!Yii::$app->user->isGuest
                        && Yii::$app->getUser()->getIdentity()->isManager()
                    ) {
                        return $this->redirect(['/product/update', 'id' => $eventId]);
                    } else {
                        $product = Product::findOne(['id' => $eventId]);
                        if ($product) {
                            return $this->render('view', [
                                'model' => $product
                            ]);
                        }
                    }
                }
            }
            break;
            default: {
                if ($eventId) {

                    if (!Yii::$app->user->isGuest
                        && Yii::$app->getUser()->getIdentity()->isManager()
                    ) {
                        return $this->redirect(['/event/update', 'id' => $eventId]);
                    } else {
                        $event = Event::findOne(['id' => $eventId]);
                        if ($event) {
                            return $this->render('view', [
                                'model' => $event
                            ]);
                        }
                    }
                }
            }
        }

        return $this->redirect('/site/index');
    }
}
