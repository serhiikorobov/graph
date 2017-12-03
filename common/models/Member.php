<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 11/30/2017
 * Time: 9:31 PM
 */

namespace common\models;


use common\models\member\Role;
use yii\db\ActiveRecord;
use yii;

/**
 * Class Member
 *
 * @property string $name
 * @property string $email
 * @property integer $user_id
 * @property integer $role_id
 *
 * @package common\models
 */
class Member extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%member}}';
    }

    public function rules()
    {
        $allFields = array_keys($this->attributeLabels());

        $rules = [
            [
                ['name', 'email'],
                'trim'
            ],
            [
                ['name', 'email'],
                'required'
            ],
            [
                ['name', 'email'],
                'string',
                'max' => 255
            ],
            [
                ['email'],
                'email'
            ],
            [
                ['user_id'],
                'exist',
                'targetClass' => User::className(),
                'targetAttribute' => 'id'
            ],
            [
                $allFields,
                'default',
                'value' => null
            ]
        ];


        if ($this->_roleInstalled()) {
            $rules[] = [
                'role_id',
                'exist',
                'targetClass' => Role::className(),
                'targetAttribute' => 'id'
            ];
        }

        return $rules;
    }

    public function attributeLabels()
    {
        $labels = [
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'user_id' => Yii::t('app', 'Group')
        ];

        if ($this->_roleInstalled()) {
            $labels['role_id'] =  Yii::t('app', 'Role');
        }

        return $labels;
    }

    protected function _roleInstalled()
    {
        $table = static::getDb()->schema->getTableSchema(static::tableName());

        return isset($table->columns['role_id']) ? true : false;
    }

}