<?php

namespace common\modules\admin\models;

use Yii;
use yii\db\Expression;
use yii\web\NotFoundHttpException;
use common\modules\people\models\ClinicEmployee;

/**
 * This is the model class for table "log".
 *
 * @property integer $id_log
 * @property integer $id_user
 * @property string $type
 * @property string $log
 * @property string $date_creation
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user'], 'integer'],
            [['log'], 'safe'],
            [['date_creation'], 'safe'],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'Id Log',
            'id_user' => 'Usuario',
            'type' => 'Tipo',
            'log' => 'Log',
            'date_creation' => 'Fecha',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->date_creation = new Expression('NOW()');
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmployee()
    {
        return $this->hasOne(ClinicEmployee::className(), ['id_user' => 'id_user']);
    }
}
