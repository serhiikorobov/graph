<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/3/2017
 * Time: 11:39 AM
 */

namespace common\models\event\source;


use common\models\event\source\SourceAbstract;
use common\models\Member;
use common\models\member\Role;
use common\models\User;

class Assigned extends SourceAbstract
{
    const PM = 'PM';
    const TME = 'TME';
    const CONTENT = 'Content';
    const XPM = 'XPM';
    const PR = 'PR';
    const PRESENTATIONS = 'Presentations';
    const GRAPHICS = 'Graphics';
    const WEBCAST = 'Webcast';

    public static $role;

    public function getOptions($withDefault = true)
    {
        $options = [];
        if ($withDefault) {
            $options[''] = '';
        }

        $options += $this->_getMemberOptions();

        return $options;
    }

    public function getRoleOption($role, $withDefault = true)
    {
        self::$role = $role;

        return $this->getOptions($withDefault);
    }

    protected function _getMemberOptions()
    {
        $memberQuery = Member::find();
        $memberQuery
            ->alias('m')
            ->join('INNER JOIN', Role::tableName() . ' r', 'r.id=m.role_id')
            ->where(['r.lock_id' => self::$role])
            ->orderBy('m.name');

        $members = $memberQuery->all();

        $options = [];
        foreach ($members as $member) {
            $options[$member->id] = $member->name;
        }

        return $options;
    }

    public static function getLockRoles()
    {
        return [
            self::PM,
            self::TME,
            self::CONTENT,
            self::XPM,
            self::PR,
            self::PRESENTATIONS,
            self::GRAPHICS,
            self::WEBCAST,
        ];
    }

}