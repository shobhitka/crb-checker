<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offenses".
 *
 * @property int $offense_id
 * @property string $offense_name
 * @property int $offense_type
 * @property string|null $offense_desc
 *
 * @property CriminalRecord[] $criminalRecords
 */
class Offenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offense_name', 'offense_type'], 'required'],
            [['offense_type'], 'integer'],
            [['offense_name'], 'string', 'max' => 64],
            [['offense_desc'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'offense_id' => 'Offense ID',
            'offense_name' => 'Offense Name',
            'offense_type' => 'Offense Type',
            'offense_desc' => 'Offense Desc',
        ];
    }

    /**
     * Gets query for [[CriminalRecords]].
     *
     * @return \yii\db\ActiveQuery|CriminalRecordQuery
     */
    public function getCriminalRecords()
    {
        return $this->hasMany(CriminalRecord::class, ['record_offense_id' => 'offense_id']);
    }

    /**
     * {@inheritdoc}
     * @return OffensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OffensesQuery(get_called_class());
    }
}
