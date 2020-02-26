<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_auth_item_revoke".
 *
 * @property string $name
 * @property integer $id_user
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthItemRevoke extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_auth_item_revoke';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_user', 'type'], 'required'],
            [['id_user', 'type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'id_user' => 'Id User',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
