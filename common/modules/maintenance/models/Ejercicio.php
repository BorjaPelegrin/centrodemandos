<?php

namespace common\modules\maintenance\models;

use Yii;

/**
 * This is the model class for table "ejercicio".
 *
 * @property int $id_ejercicio
 * @property string $name
 * @property string|null $video
 * @property string|null $file
 * @property int $id_zona
 * @property int $id_tipo
 *
 * @property Tipo $tipo
 * @property Zona $zona
 */
class Ejercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ejercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_zona', 'id_tipo'], 'required'],
            [['id_zona', 'id_tipo'], 'integer'],
            [['name', 'video', 'file'], 'string', 'max' => 100],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id_tipo']],
            [['id_zona'], 'exist', 'skipOnError' => true, 'targetClass' => Zona::className(), 'targetAttribute' => ['id_zona' => 'id_zona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ejercicio' => 'Id Ejercicio',
            'name' => 'Name',
            'video' => 'Video',
            'file' => 'File',
            'id_zona' => 'Id Zona',
            'id_tipo' => 'Id Tipo',
        ];
    }

    /**
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id_tipo' => 'id_tipo']);
    }

    /**
     * Gets query for [[Zona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZona()
    {
        return $this->hasOne(Zona::className(), ['id_zona' => 'id_zona']);
    }
}
