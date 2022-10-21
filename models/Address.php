<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property string|null $address_start_date
 * @property string|null $address_end_date
 * @property int $address_type
 * @property string $address_city
 * @property string $address_state
 * @property string $address_details
 * @property int $address_person_id
 *
 * @property Registry $addressPerson
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_start_date', 'address_end_date'], 'safe'],
            [['address_type', 'address_city', 'address_state', 'address_details', 'address_person_id'], 'required'],
            [['address_type', 'address_person_id'], 'integer'],
            [['address_city', 'address_state'], 'string', 'max' => 32],
            [['address_details'], 'string', 'max' => 128],
            [['address_person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Registry::class, 'targetAttribute' => ['address_person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address_start_date' => 'Address Start Date',
            'address_end_date' => 'Address End Date',
            'address_type' => 'Address Type',
            'address_city' => 'Address City',
            'address_state' => 'Address State',
            'address_details' => 'Address Details',
            'address_person_id' => 'Address Person ID',
        ];
    }

    /**
     * Gets query for [[AddressPerson]].
     *
     * @return \yii\db\ActiveQuery|RegistryQuery
     */
    public function getAddressPerson()
    {
        return $this->hasOne(Registry::class, ['person_id' => 'address_person_id']);
    }

    /**
     * {@inheritdoc}
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
