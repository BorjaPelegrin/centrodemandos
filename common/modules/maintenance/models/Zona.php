<?php

namespace common\modules\maintenance\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "zona".
 *
 * @property integer $id_zona
 * @property string $name
 * @property string $is_archived
 *
 * @property Ejercicio[] $ejercicios
 */
 class Zona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['is_archived'], 'string'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_zona' => 'Id Zona',
            'name' => 'Zona',
            'is_archived' => 'Is Archived',
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
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicios()
    {
        return $this->hasMany(Ejercicio::className(), ['id_zona' => 'id_zona']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id_zona', 'name');
    }
}
