<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/24/2017
 * Time: 3:14 PM
 */

namespace common\models;


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

        return [
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
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'date_start' => Yii::t('app', 'Start Date'),
        ];
    }

    public function attributeTooltip()
    {
        return [];
    }
}
