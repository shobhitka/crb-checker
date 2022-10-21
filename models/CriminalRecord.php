<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criminal_record".
 *
 * @property int $record_id
 * @property string $record_num
 * @property string $conviction_date
 * @property string|null $conviction_place
 * @property int|null $curr_status
 * @property int|null $alert_flag
 * @property int $record_offense_id
 * @property int $record_conviction_id
 * @property int $record_person_id
 *
 * @property Convictions $recordConviction
 * @property Offenses $recordOffense
 * @property Registry $recordPerson
 */
class CriminalRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'criminal_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record_num', 'conviction_date', 'record_offense_id', 'record_conviction_id', 'record_person_id'], 'required'],
            [['conviction_date'], 'safe'],
            [['curr_status', 'alert_flag', 'record_offense_id', 'record_conviction_id', 'record_person_id'], 'integer'],
            [['record_num'], 'string', 'max' => 32],
            [['conviction_place'], 'string', 'max' => 128],
            [['record_num'], 'unique'],
            [['record_offense_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offenses::class, 'targetAttribute' => ['record_offense_id' => 'offense_id']],
            [['record_conviction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Convictions::class, 'targetAttribute' => ['record_conviction_id' => 'conviction_id']],
            [['record_person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Registry::class, 'targetAttribute' => ['record_person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'record_num' => 'Record Num',
            'conviction_date' => 'Conviction Date',
            'conviction_place' => 'Conviction Place',
            'curr_status' => 'Curr Status',
            'alert_flag' => 'Alert Flag',
            'record_offense_id' => 'Record Offense ID',
            'record_conviction_id' => 'Record Conviction ID',
            'record_person_id' => 'Record Person ID',
        ];
    }

    /**
     * Gets query for [[RecordConviction]].
     *
     * @return \yii\db\ActiveQuery|ConvictionsQuery
     */
    public function getRecordConviction()
    {
        return $this->hasOne(Convictions::class, ['conviction_id' => 'record_conviction_id']);
    }

    /**
     * Gets query for [[RecordOffense]].
     *
     * @return \yii\db\ActiveQuery|OffensesQuery
     */
    public function getRecordOffense()
    {
        return $this->hasOne(Offenses::class, ['offense_id' => 'record_offense_id']);
    }

    /**
     * Gets query for [[RecordPerson]].
     *
     * @return \yii\db\ActiveQuery|RegistryQuery
     */
    public function getRecordPerson()
    {
        return $this->hasOne(Registry::class, ['person_id' => 'record_person_id']);
    }

    /**
     * {@inheritdoc}
     * @return CriminalRecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CriminalRecordQuery(get_called_class());
    }
}
