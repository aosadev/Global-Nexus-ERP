<?php

namespace app\modules\crm\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $opportunity_id
 * @property string $type
 * @property string $status
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property string|null $created_at
 *
 * @property Opportunity $opportunity
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opportunity_id', 'type', 'status'], 'required'],
            [['opportunity_id'], 'integer'],
            [['start_date', 'end_date', 'created_at'], 'safe'],
            [['description'], 'string'],
            [['type', 'status'], 'string', 'max' => 255],
            [['opportunity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opportunity::class, 'targetAttribute' => ['opportunity_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'opportunity_id' => 'Opportunity ID',
            'type' => 'Type',
            'status' => 'Status',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Opportunity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpportunity()
    {
        return $this->hasOne(Opportunity::class, ['id' => 'opportunity_id']);
    }
}
