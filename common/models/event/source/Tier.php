<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:19 PM
 */

namespace common\models\event\source;


class Tier extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            '1' => \Yii::t('app', '1'),
            '2' => \Yii::t('app', '2'),
            '3' => \Yii::t('app', '3'),
            '4' => \Yii::t('app', '4'),
            '5' => \Yii::t('app', '5')
        ];

        return $options;
    }
}
