<?php

namespace common\models\member\source;

use common\models\User;

class Group extends \common\models\event\source\SourceAbstract
{
    public function getOptions($withDefault = true)
    {
        $options = [];

        if ($withDefault) {
            $options = [
                '' => ''
            ];
        }

        $users = \common\models\User::find()
            ->where(['in', 'role', [User::ROLE_ADMIN]])
            ->orderBy('username')
            ->all();

        /* @var User $user */
        foreach ($users as $user) {
            $options[$user->id] = $user->username;
        }

        return $options;
    }
}