<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 3/20/17
 * Time: 10:28 AM
 */

namespace frontend\controllers;


use common\models\Venue;
use yii\base\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionJson()
    {
        $responce = array();
        $responce['page'] = 1;
        $responce['total'] = 1;
        $responce['records'] = 10;

        for ($i = 0; $i < 10; $i++) {
            $responce['rows'][$i]['id'] = $i;
            $responce['rows'][$i]['cell'] = array(
                $i,
                (new \DateTime())->format(Venue::DATE_INTERNAL_FORMAT),
                'Test ' . $i,
                $i,
                $i,
                $i,
                'Note ' . $i
            );
        }

        echo json_encode($responce);
    }
}
