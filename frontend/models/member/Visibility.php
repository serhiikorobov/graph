<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 12/1/2017
 * Time: 3:48 PM
 */

namespace frontend\models\member;

use common\models\member\source\visibility\Watcher;
use common\models\member\Visibility as VisibilityBase;

class Visibility extends VisibilityBase
{
    public static function deleteItemsByWatcherId($watcherId)
    {
        $condition = null;
        if ($watcherId === Watcher::ANONYMOUS) {
            $condition = ['watcher_group_id' => null];
        } else {
            $condition = ['watcher_group_id' => $watcherId];
        }

        return self::deleteAll($condition);
    }
}