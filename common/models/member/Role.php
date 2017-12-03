<?php

/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 10:25 AM
 */


namespace common\models\member;

use yii\db\ActiveRecord;
use yii;
/**
 * Class Role
 *
 * @property string $name
 * @property string $role_id
 * @property string $lock_id
 *
 * @package common\models\member
 */
class Role extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%member_role}}';
    }

    public function rules()
    {
        $allFields = array_keys($this->attributeLabels());

        return [
            [
                'name',
                'trim'
            ],
            [
                'name',
                'required'
            ],
            [
                'name',
                'string',
                'max' => 255
            ],
            [
                ['name'],
                'unique'
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
            'name' => Yii::t('app', 'Name')
        ];
    }

    public function beforeDelete()
    {
        $isValid = parent::beforeDelete();

        if ($isValid) {
            if ($this->lock_id !== null) {
                //throw new \Exception('You can not delete role. This role use for assign events');
                $isValid = false;
            }
        }

        return $isValid;
    }
}