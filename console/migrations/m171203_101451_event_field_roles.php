<?php



class m171203_101451_event_field_roles extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171203_101451_event_field_roles cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $eventTableName = \common\models\Event::tableName();

        $this->update($eventTableName, ['atme' => null, 'apm' => null]);

        $this->alterColumn($eventTableName, 'atme', $this->integer());
        $this->alterColumn($eventTableName, 'apm', $this->integer());

        $this->addColumn($eventTableName, 'acontent', $this->integer());
        $this->addColumn($eventTableName, 'axpm', $this->integer());
        $this->addColumn($eventTableName, 'apr', $this->integer());
        $this->addColumn($eventTableName, 'apresentations', $this->integer());
        $this->addColumn($eventTableName, 'agraphics', $this->integer());
        $this->addColumn($eventTableName, 'awebcast', $this->integer());

        $memberTableName = \common\models\Member::tableName();
        $columns = \common\models\Event::getRoleFields();
        foreach ($columns as $column) {
            $this->addForeignKey(
                'fk-event-' . $column,
                $eventTableName,
                $column,
                $memberTableName,
                'id',
                'SET NULL'
            );
        }
    }

    public function safeDown()
    {
        $eventTableName = \common\models\Event::tableName();
        $columns = \common\models\Event::getRoleFields();
        foreach ($columns as $column) {
            $this->dropForeignKey(
                'fk-event-' . $column,
                $eventTableName
            );
        }

        $this->dropColumn($eventTableName, 'acontent');
        $this->dropColumn($eventTableName, 'axpm');
        $this->dropColumn($eventTableName, 'apr');
        $this->dropColumn($eventTableName, 'apresentations');
        $this->dropColumn($eventTableName, 'agraphics');
        $this->dropColumn($eventTableName, 'awebcast');
    }

}
