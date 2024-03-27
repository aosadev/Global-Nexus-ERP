<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m240327_153301_create_activities_table extends Migration
{
    public function up()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'opportunity_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'start_date' => $this->dateTime(),
            'end_date' => $this->dateTime(),
            'description' => $this->text(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Add foreign key for table `opportunity`
        $this->addForeignKey(
            'fk-activity-opportunity_id',
            'activity',
            'opportunity_id',
            'opportunity',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // Drop foreign key for table `opportunity`
        $this->dropForeignKey(
            'fk-activity-opportunity_id',
            'activity'
        );

        $this->dropTable('activity');
    }
}
