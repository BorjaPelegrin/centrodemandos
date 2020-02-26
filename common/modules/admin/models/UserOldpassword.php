<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_user_oldpassword".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $created_at
 */
class UserOldpassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user_oldpassword';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'created_at' => 'Created At',
        ];
    }
}
