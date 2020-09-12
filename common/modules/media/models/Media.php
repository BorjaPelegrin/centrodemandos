<?php

namespace common\modules\media\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "media".
 *
 * @property integer $id_media
 * @property string $associated_tb
 * @property integer $associated_id
 * @property integer $id_media_type
 * @property integer $id_mime_type
 * @property string $source
 * @property string $name
 * @property string $date
 * @property string $is_archived
 * @property string $archived_date
 *
 * @property MediaType $mediaType
 * @property MimeType $mimeType
 */
 class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['associated_tb', 'source', 'name', 'date'], 'required'],
            [['associated_id', 'id_media_type', 'id_mime_type'], 'integer'],
            [['date', 'archived_date'], 'safe'],
            [['is_archived'], 'string'],
            [['associated_tb'], 'string', 'max' => 128],
            [['source'], 'string', 'max' => 500],
            [['name'], 'string', 'max' => 100],
            [['id_media_type'], 'exist', 'skipOnError' => true, 'targetClass' => MediaType::className(), 'targetAttribute' => ['id_media_type' => 'id_media_type']],
            [['id_mime_type'], 'exist', 'skipOnError' => true, 'targetClass' => MimeType::className(), 'targetAttribute' => ['id_mime_type' => 'id_mime_type']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_media' => 'Id Media',
            'associated_tb' => 'Associated Tb',
            'associated_id' => 'Associated ID',
            'id_media_type' => 'Id Media Type',
            'id_mime_type' => 'Id Mime Type',
            'source' => 'Source',
            'name' => 'Name',
            'date' => 'Date',
            'is_archived' => 'Is Archived',
            'archived_date' => 'Archived Date',
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
    public function getMediaType()
    {
        return $this->hasOne(MediaType::className(), ['id_media_type' => 'id_media_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMimeType()
    {
        return $this->hasOne(MimeType::className(), ['id_mime_type' => 'id_mime_type']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(self::find()->asArray()->all(), 'id_media', 'name');
    }
}
