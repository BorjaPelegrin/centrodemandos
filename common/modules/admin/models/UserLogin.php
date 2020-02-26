<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_user_login".
 *
 * @property integer $user_id
 * @property string $client_ip
 * @property string $http_user_agent
 * @property string $created_at
 */
 class UserLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'client_ip', 'http_user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['http_user_agent'], 'string'],
            [['created_at'], 'safe'],
            [['client_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'client_ip' => 'Client Ip',
            'http_user_agent' => 'Http User Agent',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

        }
    }

    /**
     * @inheritdoc
     * @return \common\modules\admin\queries\UserLoginQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\admin\queries\UserLoginQuery(get_called_class());
    }
}
