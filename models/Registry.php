<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registry".
 *
 * @property int $person_id
 * @property string|null $email
 * @property string $fisrt_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $dob
 * @property string|null $phone
 *
 * @property Address[] $addresses
 * @property CriminalRecord[] $criminalRecords
 */
class Registry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fisrt_name', 'last_name'], 'required'],
            [['dob'], 'safe'],
            [['email'], 'string', 'max' => 64],
            [['fisrt_name', 'middle_name', 'last_name', 'phone'], 'string', 'max' => 32],
            [['person_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'email' => 'Email',
            'fisrt_name' => 'Fisrt Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery|AddressQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['address_person_id' => 'person_id']);
    }

    /**
     * Gets query for [[CriminalRecords]].
     *
     * @return \yii\db\ActiveQuery|CriminalRecordQuery
     */
    public function getCriminalRecords()
    {
        return $this->hasMany(CriminalRecord::class, ['record_person_id' => 'person_id']);
    }

    /**
     * {@inheritdoc}
     * @return RegistryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegistryQuery(get_called_class());
    }
}
