<?php


/**
 * Class m171210_165555_add_product_focus_field
 */
class m171210_165555_add_product_focus_field extends \console\models\Migration
{
    /*

    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171210_165555_add_product_focus_field cannot be reverted.\n";

        return false;
    }*/

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $eventTableName = \common\models\Event::tableName();
        $this->addColumn($eventTableName, 'product_focus', $this->integer(1));
    }

    public function down()
    {
        $eventTableName = \common\models\Event::tableName();
        $this->dropColumn($eventTableName, 'product_focus');
    }

}
