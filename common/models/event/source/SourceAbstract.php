<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:31 PM
 */

namespace common\models\event\source;


use yii\base\Object;

abstract class SourceAbstract extends Object
{
    abstract function getOptions();

    public function getValues()
    {
        return array_keys($this->getOptions());
    }

    /**
     * @param $value
     * @return string
     */
    public function getOptionText($value)
    {
        $label = 'NONE';
        $options = $this->getOptions();
        if (isset($options[$value])) {
            $label = $options[$value];
        }

        return $label;
    }
} 