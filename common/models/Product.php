<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/24/2017
 * Time: 3:14 PM
 */

namespace common\models;


use common\models\event\validator\OptionValidator;
use common\models\product\source\Breakdown;
use \Yii;
use yii\db\ActiveRecord;

/**
 * Class Product
 *
 * @property $name Name
 * @property $description Description
 * @property $date_start Date Start
 *
 * @package common\models
 */
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%product}}';
    }

    public function rules()
    {
        $allFields = array_keys($this->attributeLabels());

        $rules = [
            [
                ['name', 'date_start'],
                'required'
            ],
            [
                ['name'],
                'string',
                'max' => 255
            ],
            [
                ['description'],
                'string'
            ],
            [
                ['date_start'],
                'date',
                'format' => 'php:' . Event::DATETIME_DISPLAY_FORMAT
            ],
            [
                $allFields,
                'default',
                'value' => null
            ]
        ];

        if ($this->_breakdownFieldInstalled()) {
            $rules[] = [
                ['breakdown'],
                OptionValidator::className(),
                'source_model' => Breakdown::className()
            ];
        }

        return $rules;
    }

    public function attributeLabels()
    {
        $labels = [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'date_start' => Yii::t('app', 'Start Date'),
        ];

        if ($this->_breakdownFieldInstalled()) {
            $labels['breakdown'] = Yii::t('app', 'Breakdown');
        }

        return $labels;
    }

    public function attributeTooltip()
    {
        return [];
    }

    protected function _breakdownFieldInstalled()
    {
        $tableSchema = static::getDb()
            ->schema
            ->getTableSchema(static::tableName());

        return isset ($tableSchema->columns['breakdown']);
    }
}
