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
class UserEntity extends \yii\db\ActiveRecord
{
    const TYPE_CLINIC = 'clinic';
    public $entity;
    public $clinics;

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
            'clinics' => 'Clínicas'
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

    private function setClinics()
    {
        $extra = [];
        $clinics = [];
        if (!is_null($this->clinics) && !empty($this->clinics)) {
            foreach ($this->clinics as $id => $clinic) {
                array_push($clinics, ['num'=>$clinic]);
            }
            $extra ['clinics'] = $clinics;
        }

        $this->extra_data = json_encode($extra);
    }

    public function getUrlImage()
    {
        return $this->entity->urlImage;
    }

    public function getButton()
    {
        switch ($this->associated_tb) {
            case 'employee':
                $button = Html::a($this->fullName, ['/people/employee/view','id'=>$this->associated_id], [
                    'class' => 'btn btn-primary btn-block btn-flat'
                ]);
                break;
            default:
                return null;
        }

        return $button;
    }

    public function getClinicButton()
    {
        switch ($this->associated_tb) {
            case 'employee':
                $ce = ClinicEmployee::find()->where([
                    'id_clinic'=>Yii::$app->people->clinicSelected()->id_clinic,
                    'id_employee'=>$this->associated_id
                ])->one(Yii::$app->db);
                $button = Html::a($ce->idClinic->name, ['/clinic/clinic/view','id'=>$ce->id_clinic], [
                    'class' => 'btn btn-primary btn-block btn-flat'
                ]);
                break;
            default:
                return null;
        }

        return $button;
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
