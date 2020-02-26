<?php

namespace common\modules\admin\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "yii_settings".
 *
 * @property integer $id_setting
 * @property string $description
 * @property string $associated_tb
 * @property integer $associated_id
 * @property string $type
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'associated_tb'], 'required'],
            [['associated_id'], 'integer'],
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['description', 'associated_tb'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_setting' => 'Id Setting',
            'description' => 'Descripción',
            'associated_tb' => 'Asociado a:',
            'associated_id' => 'Id asociado',
            'type' => 'Tipo',
            'value' => 'Valor',
            'created_at' => 'Creado',
            'updated_at' => 'Actualizado',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);

        if ($this->associated_tb == 'web') {
            $this->value = preg_replace("/[\r\n|\n|\r]+/", '', $this->value);
        }

        return true;
    }
}
