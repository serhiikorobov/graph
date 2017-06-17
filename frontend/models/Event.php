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
    /**
     * @return number
     */
    public function getGlobalTier()
    {
        return $this->tier;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return \DateTime::createFromFormat(self::DATETIME_INTERNAL_FORMAT, $this->date_start);
    }

    public function getevent_name()
    {
        return $this->short_name;
    }
} 