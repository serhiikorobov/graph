<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 3/15/17
 * Time: 9:34 AM
 */

namespace frontend\controllers;

use common\models\Venue;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
}
