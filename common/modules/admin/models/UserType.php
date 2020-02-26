<?php

namespace common\modules\admin\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

use common\modules\people\models\Employee;
use common\modules\people\models\ClinicEmployee;

/**
 * This is the model class for table "yii_user_entity".
 *
 * @property integer $id_user_entity
 * @property integer $user_id
 * @property string $associated_tb
 * @property integer $associated_id
 * @property string $extra_data
 */
class UserType extends \yii\db\ActiveRecord
{
    public $entity;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user_entity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'associated_id'], 'integer'],
            [['associated_tb'], 'string', 'max' => 20],
            [['extra_data', 'clinics'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user_entity' => 'Entidad',
            'user_id' => 'Usuario',
            'associated_tb' => 'Asociado a',
            'associated_id' => 'Nº asociado',
            'extra_data' => 'Datos extra',
        ];
    }

    public function afterFind()
    {
        parent::afterFind();
        switch ($this->associated_tb) {
            case 'employee':
                $this->entity = Employee::find()->where(['id_employee'=>$this->associated_id])->one(Yii::$app->db);
                break;
            default:
                return 'http://via.placeholder.com/160x160';
        }
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($this->isNewRecord) {

        }

        // Añado las clínicas
        $this->setClinics();

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

    }

    public function getUrlImage()
    {
        return $this->entity->urlImage;
    }

    public function getButton()
    {
        return $this->entity->button;
    }

    public function getUrlProfile()
    {
        return $this->entity->urlProfile;
    }

    public function getFullName()
    {
        return $this->entity->fullName;
    }
}
