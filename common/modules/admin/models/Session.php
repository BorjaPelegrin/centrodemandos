<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_session".
 *
 * @property string $id
 * @property integer $expire
 * @property resource $data
 * @property integer $user_id
 * @property string $last_write
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['expire', 'user_id'], 'integer'],
            [['data'], 'string'],
            [['last_write'], 'safe'],
            [['id'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expire' => 'Expira',
            'data' => 'Datos',
            'user_id' => 'Usuario',
            'last_write' => 'Acceso anterior',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
