<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:18 PM
 */

namespace common\models\event\source;


class Objectives extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            'ai' => \Yii::t('app', 'AI'),
            'ad' => \Yii::t('app', 'AD'),
            'vr' => \Yii::t('app', 'VR'),
            'smartConnected_home' => \Yii::t('app', 'SmartConnected Home'),
        ];

        return $options;
    }
}
