<?php

use \common\models\User;

class m171202_122814_add_users extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171202_122814_add_users cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $names = [
            'GIM',
            'EKG Demos',
            'Corp Demos',
            'EKG Production',
            'EKG Production',
            'Demo Depot',
            'Live Events And Production',
            'Retail Sales',
            'Retail Sales',
            'Operations-Shipping',
            'PR',
            'GTM',
            'DCG',
            'Mobile Client',
            'Regional Sales',
            'Samsung Sales',
            'Global Accounts',
            'Lenovo Sales',
            'Huawei Sales',
            'Dell Sales',
            'Partner Marketing',
            'Global Accounts',
            'HP Sales',
            'CTE Sales',
            'Xiaomi Sales',
            'Asus Regional Sales',
            'Asus Sales',
            'Asus Regional Sales',
            'Acer Regional Sales',
            'Acer Sales',
            'Regional Sales',
            'MSI Sales',
            'Partner Marketing',
            'Acer Sales',
            'Client Operations',
            'Microsoft Global Sales',
            'NSG',
            'Thunderbolt 3',
            'Smart Home Group',
            'Mobile Client',
            'Connected Home',
            'Desktop Platform Group',
            'Developer Relations',
            'PECA',
            'admin' => User::ROLE_SUPER_ADMIN
        ];

        foreach ($names as $key => $value) {

            $name = $value;
            $role = User::ROLE_ADMIN;
            if (is_string($key)) {
                $name = $key;
                $role = $value;
            }

            $exist = User::find()
                    ->select(new \yii\db\Expression('COUNT(*)'))
                ->where(['username' => $name])
                ->createCommand()
                ->queryScalar() > 0;

            if ($exist) {
                continue;
            }

            $user = new User();

            $clearName = preg_replace('/[^a-z]/i', '', $name);
            $user->setAttributes([
                'username' => $name,
                'email' => strtolower($clearName) . '@intel.com',
                'role' => $role,
                'status' => User::STATUS_ACTIVE
            ]);

            $user->setPassword('q123456');
            $user->generateAuthKey();

            if (!$user->save()) {
                $errors = $user->getErrors();

                $message = array();
                foreach ($errors as $attr => $internalErrors) {
                    $message[] = $attr . '::' . implode(',', $internalErrors) . ' VALUE:' . $user->$attr;
                }
                throw new \Exception(implode("\r\n", $message));
            }
        }
    }

    public function safeDown()
    {
        $this->delete(User::tableName());
    }

}
