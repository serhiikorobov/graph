<?php

use yii\db\Migration;

class m170824_121129_product_lanch extends \console\models\Migration
{
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->text(),
            'date_start' => $this->datetime()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170824_121129_product_lanch cannot be reverted.\n";

        return false;
    }
    */
}
