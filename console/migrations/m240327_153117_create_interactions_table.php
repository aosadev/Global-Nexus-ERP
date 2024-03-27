<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interactions}}`.
 */
class m240327_153117_create_interactions_table extends Migration
{
    public function up()
    {
        $this->createTable('interaction', [
            'id' => $this->primaryKey(),
            'contact_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'notes' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-interaction-contact_id',
            'interaction',
            'contact_id',
            'contact',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-interaction-contact_id',
            'interaction'
        );
        $this->dropTable('interaction');
    }
}
