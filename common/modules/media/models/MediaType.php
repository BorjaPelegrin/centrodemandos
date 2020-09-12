<?php

namespace common\modules\media\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "media_type".
 *
 * @property integer $id_media_type
 * @property string $description
 *
 * @property Media[] $media
 */
 class MediaType extends \yii\db\ActiveRecord
{
    CONST EJER_ANIMADO = 1;
    CONST EJER_ESTATICO = 2;
    CONST IMG_PERFIL = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_media_type' => 'Id Media Type',
            'description' => 'Description',
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
    public function getMedia()
    {
        return $this->hasMany(Media::className(), ['id_media_type' => 'id_media_type']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id_media_type', 'name');
    }
}
