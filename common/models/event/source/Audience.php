<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 11:53 AM
 */

namespace common\models\event\source;


class Audience extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'internal' => \Yii::t('app', 'Internal'),
            'external' => \Yii::t('app', 'External'),
            'mix' => \Yii::t('app', 'Mix'),
            //'unknown' => \Yii::t('app', 'Unknown')
        ];

        return $options;
    }
} 