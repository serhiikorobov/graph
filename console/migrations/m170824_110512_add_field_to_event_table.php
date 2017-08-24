<?php

class m170824_110512_add_field_to_event_table extends \console\models\Migration
{
    public function safeUp()
    {
        $tableName = \common\models\Event::tableName();
        $this->addColumn($tableName, 'catering', $this->string(255));
        $this->addColumn($tableName, 'network', $this->string(255));
        $this->addColumn($tableName, 'security', $this->string(255));
    }

    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170824_110512_add_field_to_event_table cannot be reverted.\n";

        return false;
    }
    */
}
