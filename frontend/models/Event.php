<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 4/4/17
 * Time: 5:21 PM
 */

namespace frontend\models;

use common\models\Event as EventBase;

class Event extends EventBase
{
    public static function tableName()
    {
        return '{{%event}}';
    }
} 