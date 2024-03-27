<?php

namespace app\modules\crm\models;

use Yii;

/**
 * This is the model class for table "interaction".
 *
 * @property int $id
 * @property int $contact_id
 * @property string $type
 * @property string $date
 * @property string|null $notes
 *
 * @property Contact $contact
 */
class Interaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contact_id', 'type', 'date'], 'required'],
            [['contact_id'], 'integer'],
            [['date'], 'safe'],
            [['notes'], 'string'],
            [['type'], 'string', 'max' => 255],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::class, 'targetAttribute' => ['contact_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_id' => 'Contact ID',
            'type' => 'Type',
            'date' => 'Date',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[Contact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'contact_id']);
    }
}
