<?php

namespace common\modules\media\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mime_type".
 *
 * @property integer $id_mime_type
 * @property string $mime
 * @property string $extension
 * @property string $category
 *
 * @property Media[] $media
 */
 class MimeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mime_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mime', 'extension'], 'required'],
            [['category'], 'string'],
            [['mime'], 'string', 'max' => 100],
            [['extension'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mime_type' => 'Id Mime Type',
            'mime' => 'Mime',
            'extension' => 'Extension',
            'category' => 'Category',
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
        return $this->hasMany(Media::className(), ['id_mime_type' => 'id_mime_type']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id_mime_type', 'name');
    }
}
