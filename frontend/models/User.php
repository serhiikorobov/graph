<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/14/2017
 * Time: 8:43 PM
 */

namespace frontend\models;

use common\models\User as UserBase;

class User extends UserBase
{
    public static function getStatusOptions()
    {
        $statusOptions = [
            self::STATUS_ACTIVE => \Yii::t('app', 'Active'),
            self::STATUS_DELETED => \Yii::t('app', 'Not Active')
        ];

        return $statusOptions;
    }

    public static function getRoleOptions()
    {
        $roleOptions = [
            self::ROLE_ADMIN => \Yii::t('app', 'Manager'),
            self::ROLE_SUPER_ADMIN => \Yii::t('app', 'Admin')
        ];

        return $roleOptions;
    }

    public function getStatusLabel()
    {
        $options = self::getStatusOptions();

        return isset($options[$this->status]) ? $options[$this->status] : 'NONE';
    }

    public function getRoleLabel()
    {
        $options = self::getRoleOptions();

        return isset($options[$this->role]) ? $options[$this->role] : 'NONE';
    }
}