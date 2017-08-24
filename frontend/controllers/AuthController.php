<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/17/2017
 * Time: 6:52 PM
 */

namespace frontend\controllers;

use yii\web\Controller;

abstract class AuthController extends Controller
{
    public function beforeAction($action)
    {
        $result = parent::beforeAction($action);

        if ($result) {
            if (\Yii::$app->user->isGuest) {
                $result = false;
                $this->goHome();
            }
        }

        return $result;
    }
}