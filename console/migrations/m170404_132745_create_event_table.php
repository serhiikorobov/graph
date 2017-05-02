<?php


/**
 * Handles the creation of table `event`.
 */
class m170404_132745_create_event_table extends \console\models\Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'short_name' => $this->string(255),
            'description' => $this->text(),
            'website' => $this->string(255),
            'date_start' => $this->datetime(),
            'date_end' => $this->datetime(),
            'location' => $this->text(),
            'venue_name' => $this->text(),
            'goals' => $this->text(),
            'audience' => $this->string(50),
            'audience_size' => $this->integer(),
            'products' => $this->text(),
            'experiences' => $this->text(),
            'nda' => $this->string(50),
            'audience_persons' => $this->text(),
            'expectations' => $this->text(),
            'customers' => $this->text(),
            'partners' => $this->text(),
            'comments' => $this->text(),
            'apm' => $this->text(),
            'atme' => $this->text(),
            'a_v' => $this->string(50),
            'stage' => $this->string(50),
            'logistics_date_start' => $this->datetime(),
            'logistics_date_end' => $this->datetime(),
            'tear_down_date_start' => $this->datetime(),
            'tear_down_date_end' => $this->datetime(),
            'logistics' => $this->string(50),
            'arrival_date' => $this->datetime(),
            'departure_date' => $this->datetime(),
            'layout_stage' => $this->text(),
            'layout_demo_area' => $this->text(),
            'level_of_support' => $this->string(50),
            'budget' => $this->decimal(12,4),
            'cost_center' => $this->decimal(12,4),
            'requester' => $this->text(),
            'submitter' => $this->string(50),
            'group' => $this->text(),
            'event_type' => $this->string(50),
            'number' => $this->integer(),
            'objectives' => $this->string(100),
            'sponsor' => $this->string(50),
            'keynote' => $this->string(50),
            'booth' => $this->string(50),
            'sate_lite' => $this->string(50),
            'meeting' => $this->string(50),
            'nda_suite' => $this->string(50),
            'sessions' => $this->string(50),
            'demos' => $this->string(50),
            'training' => $this->string(50),
            'launch' => $this->string(50),
            'pr' => $this->string(50),
            'costs' => $this->decimal(12,4),
            'shipping_costs' => $this->decimal(12,4),
            'tier' => $this->integer(),
            'event_quarter' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event');
    }
}
