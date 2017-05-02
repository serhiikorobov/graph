<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:11 PM
 */

namespace common\models\event\source;


class EventType extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'consumer' => \Yii::t('app', 'Consumer'),
            'industry' => \Yii::t('app', 'Industry'),
            'sales' => \Yii::t('app', 'Sales'),
            'other' => \Yii::t('app', 'Other'),
        ];

        return $options;
    }
} 