<?php

namespace common\modules\maintenance\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ejercicio".
 *
 * @property integer $id_ejercicio
 * @property string $name
 * @property string $video
 * @property string $file
 * @property integer $id_zona
 * @property integer $id_tipo
 * @property string $is_archived
 *
 * @property Tipo $tipo
 * @property Zona $zona
 */
 class Ejercicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ejercicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_zona', 'id_tipo'], 'required'],
            [['id_zona', 'id_tipo'], 'integer'],
            [['is_archived'], 'string'],
            [['name', 'video', 'file'], 'string', 'max' => 100],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id_tipo']],
            [['id_zona'], 'exist', 'skipOnError' => true, 'targetClass' => Zona::className(), 'targetAttribute' => ['id_zona' => 'id_zona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ejercicio' => 'Id Ejercicio',
            'name' => 'Ejercicio',
            'video' => 'Vídeo',
            'file' => 'Fichero',
            'id_zona' => 'Zona',
            'id_tipo' => 'Tipo',
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
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id_tipo' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZona()
    {
        return $this->hasOne(Zona::className(), ['id_zona' => 'id_zona']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id_ejercicio', 'name');
    }
}
