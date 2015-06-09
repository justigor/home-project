<?php

namespace app\models;

use Yii;
use yii2mod\user\models\BaseUserModel;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $passwordHash
 * @property string $email
 * @property integer $createdAt
 * @property integer $updatedAt
 * @property integer $lastLogin
 */
class UserModel extends BaseUserModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'passwordHash', 'email', 'createdAt', 'updatedAt'], 'required'],
            [['createdAt', 'updatedAt', 'lastLogin'], 'integer'],
            [['username', 'passwordHash', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'passwordHash' => 'Password Hash',
            'email' => 'Email',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'lastLogin' => 'Last Login',
        ];
    }
}
