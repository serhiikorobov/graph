<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/3/2017
 * Time: 1:30 PM
 */

namespace common\models\product\source;


use common\models\event\source\SourceAbstract;

class Breakdown extends SourceAbstract
{
    const ANNOUNCEMENT = 1;

    public function getOptions($withDefault = true)
    {
        $options = [];
        if ($withDefault) {
            $options[''] = '';
        }

        $options += [
            self::ANNOUNCEMENT => \Yii::t('app', 'Announcement'),
            2 => \Yii::t('app', 'Launch'),
            3 => \Yii::t('app', 'Both'),
        ];

        return $options;
    }
}