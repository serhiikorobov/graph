<?php



class m171203_112748_add_field_breakdown_to_event extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171203_112748_add_field_breakdown_to_event cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $productTable = \common\models\Product::tableName();
        $this->addColumn($productTable, 'breakdown', $this->integer(1));
    }

    public function safeDown()
    {
        $productTable = \common\models\Product::tableName();
        $this->dropColumn($productTable, 'breakdown');
    }
}
