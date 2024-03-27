<?php

namespace app\modules\crm\models;

use Yii;

/**
 * This is the model class for table "opportunity".
 *
 * @property int $id
 * @property int $customer_id
 * @property string|null $description
 * @property float|null $potential_value
 * @property string $stage
 * @property string|null $created_at
 * @property string|null $estimated_close_date
 *
 * @property Activity[] $activities
 * @property Customer $customer
 */
class Opportunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opportunity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'stage'], 'required'],
            [['customer_id'], 'integer'],
            [['description'], 'string'],
            [['potential_value'], 'number'],
            [['created_at', 'estimated_close_date'], 'safe'],
            [['stage'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'potential_value' => 'Potential Value',
            'stage' => 'Stage',
            'created_at' => 'Created At',
            'estimated_close_date' => 'Estimated Close Date',
        ];
    }

    /**
     * Gets query for [[Activities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::class, ['opportunity_id' => 'id']);
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
}
