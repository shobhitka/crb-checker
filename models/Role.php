<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $role_id
 * @property string $role_name
 * @property string|null $role_desc
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['role_name'], 'string', 'max' => 64],
            [['role_desc'], 'string', 'max' => 45],
            [['role_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_desc' => 'Role Desc',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['role_type_id' => 'role_id']);
    }

    public function getRolesArrayMap()
    {
        $model = Role::find()->all();
        $types = array();
        return ArrayHelper::map($model, 'role_id', 'role_name');
    }
}
