<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:07 PM
 */

namespace common\models\event\source;


class Submitter extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'becky' => \Yii::t('app', 'Becky'),
            'april' => \Yii::t('app', 'April'),
            'kim' => \Yii::t('app', 'Kim'),
            'nicole' => \Yii::t('app', 'Nicole'),
            'jeff' => \Yii::t('app', 'Jeff'),
            'chris' => \Yii::t('app', 'Chris'),
            'ali' => \Yii::t('app', 'Ali'),
            'art' => \Yii::t('app', 'Art'),
            'yuri' => \Yii::t('app', 'Yuri'),
        ];

        return $options;
    }
} 