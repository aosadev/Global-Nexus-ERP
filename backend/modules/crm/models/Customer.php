<?php

namespace app\modules\crm\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $industry
 * @property string|null $created_at
 *
 * @property Contact[] $contacts
 * @property Opportunity[] $opportunities
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'address', 'phone', 'email', 'industry'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'industry' => 'Industry',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Contacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Opportunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpportunities()
    {
        return $this->hasMany(Opportunity::class, ['customer_id' => 'id']);
    }
}
