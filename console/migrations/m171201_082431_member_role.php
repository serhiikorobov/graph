<?php

class m171201_082431_member_role extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171201_082431_member_role cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $memberRoleTableName = \common\models\member\Role::tableName();

        $this->createTable($memberRoleTableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'lock_id' => $this->string(20)->null()
        ]);

        $memberTableName = \common\models\Member::tableName();
        $this->addColumn($memberTableName, 'role_id', $this->integer());

        $this->addForeignKey(
            'fk-member-role_id',
            $memberTableName,
            'role_id',
            $memberRoleTableName,
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'i-member_role-name-unique',
            $memberRoleTableName,
            'name',
            true
        );

        $this->createIndex(
            'i-member_role-lock_id-unique',
            $memberRoleTableName,
            'lock_id',
            true
        );
    }

    public function safeDown()
    {
        $memberTableName = \common\models\Member::tableName();
        $this->dropForeignKey('fk-member-role_id', $memberTableName);

        $this->dropColumn($memberTableName, 'role_id');

        $memberRoleTableName = \common\models\member\Role::tableName();
        $this->dropTable($memberRoleTableName);
    }
}
