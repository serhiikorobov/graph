<?php



class m171201_132705_member_visibility extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171201_132705_member_visibility cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $visibilityTableName = \common\models\member\Visibility::tableName();
        $this->createTable($visibilityTableName, [
            'id' => $this->primaryKey(),
            'watcher_group_id' => $this->integer(),
            'visible_group_id' => $this->integer()->notNull()
        ]);

        $userTableName = \common\models\User::tableName();

        $this->addForeignKey(
            'fk-member_visibility_watcher_group_id',
            $visibilityTableName,
            'watcher_group_id',
            $userTableName,
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-member_visibility-visible_group_id',
            $visibilityTableName,
            'visible_group_id',
            $userTableName,
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $visibilityTableName = \common\models\member\Visibility::tableName();
        $this->dropForeignKey('fk-member_visibility-visible_group_id', $visibilityTableName);

        $this->dropTable($visibilityTableName);
    }


}
