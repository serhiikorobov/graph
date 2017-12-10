<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/10/2017
 * Time: 7:03 PM
 */

namespace common\models\event\source;


class ProductFocus extends SourceAbstract
{
    public function getOptions($withDefault = true)
    {
        $options = [];
        if ($withDefault) {
            $options[''] = '';
        }

        $options[1] = \Yii::t('app', 'Business');
        $options[2] = \Yii::t('app', 'Gaming');
        $options[3] = \Yii::t('app', 'VR');

        return $options;
    }
}