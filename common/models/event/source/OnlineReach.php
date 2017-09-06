<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 9/4/2017
 * Time: 9:58 PM
 */

namespace common\models\event\source;


class OnlineReach extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'low' => \Yii::t('app', 'Low'),
            'medium' => \Yii::t('app', 'Medium'),
            'high' => \Yii::t('app', 'High')
        ];

        return $options;
    }
}