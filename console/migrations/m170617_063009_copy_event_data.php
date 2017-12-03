<?php

use \common\models\Venue;
use \frontend\models\Event;

class m170617_063009_copy_event_data extends \console\models\Migration
{
    public function up()
    {
        $venues = Venue::getVenues();

        /* @var Venue $venue */
        foreach ($venues as $venue) {
            $event = new Event;

            $event->short_name = $venue->event_name;
            $event->tier = $venue->getGlobalTier();
            $event->date_start = $venue->getStartDate()->format(Event::DATETIME_DISPLAY_FORMAT);
            $event->date_end = $event->date_start;
            $event->submitter = 'none';
            $event->location = 'none';

            if (!$event->save()) {
                $errors = $event->getErrors();

                $message = array();
                foreach ($errors as $attr => $internalErrors) {
                    $message[] = $attr . '::' . implode(',', $internalErrors);
                }
                throw new \Exception(implode("\r\n", $message));
            }
        }
    }

    public function down()
    {
        Event::deleteAll();

        return 1;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
