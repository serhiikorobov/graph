<?php

class m170904_184142_from_varchar_to_int extends \console\models\Migration
{
    public function safeUp()
    {
        $tableName = \common\models\Event::tableName();
        $this->alterColumn($tableName, 'catering', $this->smallInteger(1));
        $this->alterColumn($tableName, 'network', $this->smallInteger(1));
        $this->alterColumn($tableName, 'security', $this->smallInteger(1));

        $this->addColumn($tableName, 'online_reach', $this->string(50));
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
        echo "m170904_184142_from_varchar_to_int cannot be reverted.\n";

        return false;
    }
    */
}
