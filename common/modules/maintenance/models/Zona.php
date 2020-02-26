<?php

namespace common\modules\maintenance\models;

use Yii;

/**
 * This is the model class for table "zona".
 *
 * @property int $id_zona
 * @property string $name
 * @property string $is_archived
 *
 * @property Ejercicio[] $ejercicios
 */
class Zona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zona';
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_zona' => 'Id Zona',
            'name' => 'Name',
            'is_archived' => 'Is Archived',
        ];
    }

    /**
     * Gets query for [[Ejercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicios()
    {
        return $this->hasMany(Ejercicio::className(), ['id_zona' => 'id_zona']);
    }
}
