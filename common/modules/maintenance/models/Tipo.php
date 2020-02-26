<?php

namespace common\modules\maintenance\models;

use Yii;

/**
 * This is the model class for table "tipo".
 *
 * @property int $id_tipo
 * @property string $name
 * @property string $is_archived
 *
 * @property Ejercicio[] $ejercicios
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'is_archived'], 'required'],
            [['is_archived'], 'string'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
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
        return $this->hasMany(Ejercicio::className(), ['id_tipo' => 'id_tipo']);
    }
}
