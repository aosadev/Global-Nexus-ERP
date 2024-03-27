<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m240327_153042_create_contacts_table extends Migration
{
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'position' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-contact-customer_id',
            'contact',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-contact-customer_id',
            'contact'
        );
        $this->dropTable('contact');
    }
}
