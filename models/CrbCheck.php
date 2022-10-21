<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "query".
 *
 * @property int $quiery_id
 * @property string $search_firstname
 * @property string|null $search_middlename
 * @property string $search_lastname
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $dob
 * @property string|null $search_city
 * @property string|null $search_timestamp
 * @property int $query_type_id
 * @property int $user_user_id
 *
 * @property QueryType $queryType
 * @property User $userUser
 */
class CrbCheck extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['search_firstname', 'search_lastname', 'query_type_id', 'user_user_id'], 'required'],
            [['start_date', 'end_date', 'dob', 'search_timestamp'], 'safe'],
            [['query_type_id', 'user_user_id'], 'integer'],
            [['search_firstname', 'search_middlename', 'search_lastname'], 'string', 'max' => 32],
            [['search_city'], 'string', 'max' => 64],
            [['query_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => QueryType::class, 'targetAttribute' => ['query_type_id' => 'type_id']],
            [['user_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quiery_id' => 'Quiery ID',
            'search_firstname' => 'Search Firstname',
            'search_middlename' => 'Search Middlename',
            'search_lastname' => 'Search Lastname',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'dob' => 'Dob',
            'search_city' => 'Search City',
            'search_timestamp' => 'Search Timestamp',
            'query_type_id' => 'Query Type ID',
            'user_user_id' => 'User User ID',
        ];
    }

    /**
     * Gets query for [[QueryType]].
     *
     * @return \yii\db\ActiveQuery|QueryTypeQuery
     */
    public function getQueryType()
    {
        return $this->hasOne(QueryType::class, ['type_id' => 'query_type_id']);
    }

    /**
     * Gets query for [[UserUser]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUserUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_user_id']);
    }

    /**
     * {@inheritdoc}
     * @return CrbCheckQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CrbCheckQuery(get_called_class());
    }
}
