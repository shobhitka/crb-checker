<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $loginname
 * @property string $password
 * @property string|null $phone
 * @property string|null $company
 * @property int $role_type_id
 *
 * @property Query[] $queries
 * @property Role $roleType
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'loginname', 'password', 'role_type_id'], 'required'],
            [['role_type_id'], 'integer'],
            [['first_name', 'last_name', 'password'], 'string', 'max' => 64],
            [['email', 'company'], 'string', 'max' => 128],
            [['loginname', 'phone'], 'string', 'max' => 32],
            [['loginname'], 'unique'],
            [['company'], 'unique'],
            [['role_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_type_id' => 'role_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'loginname' => 'Loginname',
            'password' => 'Password',
            'phone' => 'Phone',
            'company' => 'Company',
            'role_type_id' => 'Role Type ID',
        ];
    }

    /**
     * Gets query for [[Queries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQueries()
    {
        return $this->hasMany(Query::class, ['user_user_id' => 'user_id']);
    }

    /**
     * Gets query for [[RoleType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoleType()
    {
        return $this->hasOne(Role::class, ['role_id' => 'role_type_id']);
	}

	public function findByUsername($username)
	{
		$user = User::find()->where(['loginname'=>$username])->one();
		return $user;
	}

    public function validatePassword($password)
    {
        return $this->password === $password;
	}

	 public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        return $this->password;
    }

    public function validateAuthKey($authKey)
    {
        return $this->password === $authKey;
    }

    public function isAdmin()
    {
        if ($this->role_type_id == 1)
            return TRUE;
        else
            return FALSE;
    }
}
