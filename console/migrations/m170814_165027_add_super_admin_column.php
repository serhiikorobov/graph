<?php

use common\models\User as User;

class m170814_165027_add_super_admin_column extends \console\models\Migration
{
    public function safeUp()
    {
        $admin = User::find()->andWhere(['username' => 'event_admin'])->one();
        if (!$admin || !$admin->getPrimaryKey()) {
            throw new \Exception('Can not migrate data. User with username \'event_admin\' does not exist');
        }

        $this->addColumn(User::tableName(), 'role', 'smallint');

        $admin->role = User::ROLE_SUPER_ADMIN;
        $admin->save();
    }

    public function safeDown()
    {
        $this->dropColumn(User::tableName(),'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170814_165027_add_super_admin_column cannot be reverted.\n";

        return false;
    }
    */
}
