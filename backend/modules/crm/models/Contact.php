<?php

namespace app\modules\crm\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string|null $position
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $created_at
 *
 * @property Customer $customer
 * @property Interaction[] $interactions
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'name'], 'required'],
            [['customer_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'position', 'phone', 'email'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'position' => 'Position',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Interactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInteractions()
    {
        return $this->hasMany(Interaction::class, ['contact_id' => 'id']);
    }
}
