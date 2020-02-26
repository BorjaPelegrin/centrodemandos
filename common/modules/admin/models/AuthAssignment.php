<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Tipo de usuario',
            'user_id' => 'Usuario',
            'created_at' => 'Fecha creación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuthItem()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }
}
