<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:03 PM
 */

namespace common\models\event\source;


class LevelOfSupport extends SourceAbstract
{
    public function getOptions($withDefault = true)
    {
        $options = [
            '' => '',
            'local' => \Yii::t('app', 'Local'),
            'ccg' => \Yii::t('app', 'CCG'),
            'corp_demos' => \Yii::t('app', 'Corp Demos'),
            'mixed' => \Yii::t('app', 'Mixed'),
            'all' => \Yii::t('app', 'All')
        ];

        return $options;
    }
} 