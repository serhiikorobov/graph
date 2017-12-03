<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 3:21 PM
 */

namespace common\models\member;


use common\models\User;
use yii\db\ActiveRecord;
use yii;

/**
 * Class Visibility
 *
 * @property integer $watcher_group_id
 * @property integer $visible_group_id
 *
 * @package common\models\member
 */
class Visibility extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%member_visibility}}';
    }

    public function rules()
    {
        return [
            [
                'visible_group_id',
                'required'
            ],
            [
                ['watcher_group_id'],
                'exist',
                'targetClass' => User::className(),
                'targetAttribute' => 'id'
            ],
            [
                ['visible_group_id'],
                'exist',
                'targetClass' => User::className(),
                'targetAttribute' => 'id'
            ]
        ];
    }
}
