<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/5/17
 * Time: 2:26 PM
 */

namespace common\models\event\validator;

use common\models\event\source\SourceAbstract;
use yii\base\Exception;
use yii\validators\Validator;

class OptionValidator extends Validator
{
    public $source_model;

    public function init()
    {
        $this->message = \Yii::t('app', 'Selected option is invalid');

        if (!$this->source_model) {
            throw new Exception(\Yii::t('app', 'Source model is not set for OptionValidator'));
        }
    }

    protected function validateValue($value)
    {
        /* @var $source SourceAbstract */
        if (is_callable($this->source_model)) {
            $source = call_user_func($this->source_model);
        } else {
            $source = new $this->source_model;
        }

        if (!in_array($value, $source->getValues())) {
            return [$this->message, []];
        }

        return null;
    }
} 