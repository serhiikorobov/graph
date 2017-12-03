<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 2:30 PM
 */

namespace common\models\member\source;


class Role extends \common\models\event\source\SourceAbstract
{
    public function getOptions($withDefault = true)
    {
        $options = [];
        if ($withDefault) {
            $options = [
                '' => ''
            ];
        }

        $roles = \common\models\member\Role::find()
            ->orderBy('name')
            ->all();

        /* @var \common\models\member\Role $role */
        foreach ($roles as $role) {
            $options[$role->id] = $role->name;
        }

        return $options;
    }
}