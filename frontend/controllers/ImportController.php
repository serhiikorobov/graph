<?php

namespace frontend\controllers;

use common\models\Venue;
use yii\web\Controller;
use frontend\models\import\Form;
use yii\web\UploadedFile;
use yii;

class ImportController extends Controller
{
    const AUTH_COOKIE_NAME = 'auth';

    /**
     * @param yii\base\Action $action
     * @return bool
     * @throws \yii\web\HttpException
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        if ($action->id != 'login') {
            $cookies = Yii::$app->request->cookies;
            $authorized = false;
            if ($value = $cookies->get(self::AUTH_COOKIE_NAME)) {
                $password = null;
                if (isset(Yii::$app->params['admin_password'])) {
                    $password = Yii::$app->params['admin_password'];
                }

                if (md5($password . '') != $value) {
                    $authorized = false;
                } else {
                    $authorized = true;
                }
            }

            if (!$authorized) {
                $this->redirect('/');
                return false;
            }
        }

        return parent::beforeAction($action);
    }

    public function actionLogin($password)
    {
        $equal = false;
        if (isset(Yii::$app->params['admin_password'])) {
            $p = Yii::$app->params['admin_password'];

            if ($equal = ($p === $password)) {
                Yii::$app->response->cookies->add(new yii\web\Cookie(array(
                    'name' => self::AUTH_COOKIE_NAME,
                    'value' => md5($p)
                )));
            }
        }

        return json_encode(array(
            'success' => $equal
        ));
    }

    public function actionIndex()
    {
        return $this->render('index', ['model' => new Form()]);
    }

    public function actionPost()
    {
        $form = new Form();

        if (Yii::$app->request->isPost) {
            $form->internal = UploadedFile::getInstance($form, 'internal');
            $form->external = UploadedFile::getInstance($form, 'external');

            $validate = yii::$app->request->post('validate');

            $errors = array();
            if ($validate) {
                $defaultErrorMessage = 'Валидация не пройдена. Вы можете загрузить файл как есть или исправить ошибки';
                if ($form->internal) {
                    $errors[Venue::SCENARIO_INTERNAL] = Venue::validateDataByFile($form->internal->tempName, Venue::SCENARIO_INTERNAL);
                    if ($errors[Venue::SCENARIO_INTERNAL]) {
                        $form->addError('internal', $defaultErrorMessage);
                    }
                }

                if ($form->external) {
                    $errors[Venue::SCENARIO_EXTERNAL] = Venue::validateDataByFile($form->external->tempName, Venue::SCENARIO_EXTERNAL);
                    if ($errors[Venue::SCENARIO_EXTERNAL]) {
                        $form->addError('external', $defaultErrorMessage);
                    }
                }

                $form->additionalErrors = $errors;

            } else {
                $form->upload();
                $form->successfullyLoaded = true;
            }
        }

        return $this->render('index', ['model' => $form]);
    }
}
