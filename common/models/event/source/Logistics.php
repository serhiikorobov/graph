<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 1:59 PM
 */

namespace common\models\event\source;


class Logistics extends SourceAbstract
{
    public function getOptions($withDefault = true)
    {
        $options = [
            '' => '',
            'intel' => \Yii::t('app', 'Intel'),
            's_m_united' => \Yii::t('app', 'S&M United'),
            'sho-air' => \Yii::t('app', 'Sho-Air'),
            'self' => \Yii::t('app', 'Self'),
            'other' => \Yii::t('app', 'Other'),
        ];

        return $options;
    }
} 