<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convictions".
 *
 * @property int $conviction_id
 * @property int $conviction_type
 * @property string $conviction_name
 * @property string|null $conviction_desc
 *
 * @property CriminalRecord[] $criminalRecords
 */
class Convictions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convictions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conviction_type', 'conviction_name'], 'required'],
            [['conviction_type'], 'integer'],
            [['conviction_name'], 'string', 'max' => 64],
            [['conviction_desc'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'conviction_id' => 'Conviction ID',
            'conviction_type' => 'Conviction Type',
            'conviction_name' => 'Conviction Name',
            'conviction_desc' => 'Conviction Desc',
        ];
    }

    /**
     * Gets query for [[CriminalRecords]].
     *
     * @return \yii\db\ActiveQuery|CriminalRecordQuery
     */
    public function getCriminalRecords()
    {
        return $this->hasMany(CriminalRecord::class, ['record_conviction_id' => 'conviction_id']);
    }

    /**
     * {@inheritdoc}
     * @return ConvictionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConvictionsQuery(get_called_class());
    }
}
