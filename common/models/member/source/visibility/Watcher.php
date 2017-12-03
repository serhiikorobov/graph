<?php

namespace common\models\member\source\visibility;

class Watcher extends \common\models\member\source\Group
{
    const ANONYMOUS = 'a';

    public function getOptions($withDefault = true)
    {
        $options = parent::getOptions();
        unset($options['']);

        $options = [static::ANONYMOUS => \Yii::t('app', 'Not Logged In')]
            + $options;

        return $options;
    }
}