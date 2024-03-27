<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers}}`.
 */
class m240327_152837_create_customers_table extends Migration
{
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'industry' => $this->string(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }
    
    public function down()
    {
        $this->dropTable('customer');
    }
}
