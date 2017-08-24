<?php

use common\models\User as User;

class m170814_165027_add_super_admin_column extends \console\models\Migration
{
    public function safeUp()
    {
        $this->addColumn(User::tableName(), 'role', 'smallint');

        $users = User::find()->all();
        foreach ($users as $user) {
            $user->role = User::ROLE_SUPER_ADMIN;
            $user->save();
        }
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
