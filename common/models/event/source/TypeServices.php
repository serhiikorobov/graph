<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 11:56 AM
 */

namespace common\models\event\source;


class TypeServices extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'self' => \Yii::t('app', 'Self'),
            'ccg' => \Yii::t('app', 'CCG'),
            'external' => \Yii::t('app', 'External'),
            //'unknown' => \Yii::t('app', 'Unknown'),
        ];

        return $options;
    }
} 