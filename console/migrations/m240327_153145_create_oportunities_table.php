<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%oportunities}}`.
 */
class m240327_153145_create_oportunities_table extends Migration
{
    public function up()
    {
        $this->createTable('opportunity', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'potential_value' => $this->decimal(10,2),
            'stage' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'estimated_close_date' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-opportunity-customer_id',
            'opportunity',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-opportunity-customer_id',
            'opportunity'
        );
        $this->dropTable('opportunity');
    }

}
