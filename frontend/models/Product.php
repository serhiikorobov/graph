<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/24/2017
 * Time: 3:23 PM
 */

namespace frontend\models;

use common\models\Product as ProductBase;

class Product extends ProductBase
{
    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return \DateTime::createFromFormat(Event::DATETIME_INTERNAL_FORMAT, $this->date_start);
    }

    /**
     * @return number
     */
    public function getGlobalTier()
    {
        return 0;
    }

    /**
     * @return string
     */
    public function getevent_name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getshort_name()
    {
        return $this->name;
    }
}
