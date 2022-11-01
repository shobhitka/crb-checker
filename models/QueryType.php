<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "query_type".
 *
 * @property int $type_id
 * @property string $type_name
 * @property string|null $type_desc
 *
 * @property Query[] $queries
 */
class QueryType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 64],
            [['type_desc'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
            'type_desc' => 'Type Desc',
        ];
    }

    /**
     * Gets query for [[Queries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQueries()
    {
        return $this->hasMany(Query::class, ['query_type_id' => 'type_id']);
    }

    public function getQueryArrayMap()
    {
        $model = QueryType::find()->all();
        $types = array();
        return ArrayHelper::map($model, 'type_id', 'type_name');
    }

    public function getQueryName($type_id)
    {
        $model = QueryType::findone($type_id);
        return $model->type_name;
    }
}
