<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 5:10 PM
 */

namespace common\models\member\source\visibility;


use common\models\member\source\Group;

class Viewer extends Group
{
    public function getOptions($withDefault = true)
    {
        $options = parent::getOptions();

        unset($options['']);

        return $options;
    }
}