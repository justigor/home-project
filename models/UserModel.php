<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
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
     * @var string
     */
    public $newPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['username', 'email', 'createdAt', 'updatedAt'], 'required'],
            [['email'], 'email'],
            [['createdAt', 'updatedAt', 'lastLogin'], 'integer'],
            [['username', 'passwordHash', 'email'], 'string', 'max' => 255],
            [['newPassword'], 'safe'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'username'    => 'Username',
            'email'       => 'Email',
            'createdAt'   => 'Created At',
            'updatedAt'   => 'Updated At',
            'lastLogin'   => 'Last Login',
            'newPassword' => 'New Password',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (isset($this->newPassword)) {
            $this->setPassword($this->newPassword);
            $this->generateAuthKey();
        }
        return parent::beforeSave($insert);
    }
}
