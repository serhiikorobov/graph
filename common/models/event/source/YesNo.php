<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/4/17
 * Time: 5:31 PM
 */

namespace common\models\event\source;


class YesNo extends SourceAbstract
{
    public function getOptions()
    {
        $options = [
            '' => '',
            '1' => \Yii::t('app', 'Yes'),
            '0' => \Yii::t('app', 'No'),
            //'unknown' => \Yii::t('app', 'Unknown')
        ];

        return $options;
    }
} 