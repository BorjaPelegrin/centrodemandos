<?php

namespace common\modules\admin\models;

use common\modules\treatments\models\Area;

/**
 * This is the model class for table "oauth_access_token".
 *
 * @property int $id_oauth_access_token
 * @property int $id_area
 * @property string $alias
 * @property string $scope
 * @property string $access_token
 * @property string $refresh_token
 * @property int $expires_in
 * @property int $created
 *
 * @property Area $idArea
 */
class OauthAccessToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oauth_access_token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_area', 'alias', 'scope', 'access_token', 'refresh_token', 'expires_in', 'created'], 'required'],
            [['id_area', 'expires_in', 'created'], 'integer'],
            [['alias'], 'string', 'max' => 25],
            [['scope'], 'string', 'max' => 70],
            [['access_token'], 'string', 'max' => 150],
            [['refresh_token'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_oauth_access_token' => 'Id',
            'id_area' => 'Área',
            'alias' => 'API',
            'scope' => 'Scope',
            'access_token' => 'Access Token',
            'refresh_token' => 'Refresh Token',
            'expires_in' => 'Fecha de caducidad',
            'created' => 'Fecha de creación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArea()
    {
        return $this->hasOne(Area::className(), ['id_area' => 'id_area']);
    }
}
