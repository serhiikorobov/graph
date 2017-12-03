<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 11/30/2017
 * Time: 10:01 PM
 */

namespace frontend\models;

use common\models\Member as MemberBase;
use frontend\models\member\Role;

/**
 * Class Member
 *
 * @property User $user
 * @property Role $role
 *
 * @package frontend\models
 */
class Member extends MemberBase
{
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public function getGroupName()
    {
        $groupName = null;
        if ($this->user) {
            $groupName = $this->user->username;
        }

        return $groupName;
    }

    public function getRoleName()
    {
        $roleName = null;
        if ($this->role) {
            $roleName = $this->role->name;
        }

        return $roleName;
    }
}
