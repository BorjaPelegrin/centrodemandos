<?php

namespace common\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use common\modules\people\models\Employee;

/**
 * This is the model class for table "groups".
 *
 * @property string $id_group
 * @property string $name
 * @property string $description
 * @property string $id_group_parent
 * @property string $child_groups
 * @property array $id_clinic
 * @property int $clinic_excluded
 * @property array $id_area
 * @property string $associated_tb
 * @property string $id_employee
 * @property int $is_archived
 * @property string $date_start
 * @property string $date_end
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * @property Employee $employee
 * @property Groups $groupParent
 * @property Groups $groups
 * @property Employee $createdBy
 * @property Employee $updatedBy
 *
 */
class Groups extends \yii\db\ActiveRecord
{
    CONST GROUP_TREATMENT = 'treatment';
    CONST GROUP_CONSULTATION_REASON = 'consultation_reason';
    CONST GROUP_PROVIDER = 'provider';
    public $child_groups;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'associated_tb', /*'created_by'*/], 'required'],
            [['id_group_parent', 'id_employee', 'created_by', 'updated_by'], 'integer'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description', /*'id_clinic', 'id_area'*/], 'string', 'max' => 255],
            [['id_clinic', 'id_area', 'child_groups'], 'safe'],
            //[['clinic_excluded', 'is_archived'], 'string', 'max' => 1],
            [['clinic_excluded', 'is_archived'], 'boolean'],
            [['associated_tb'], 'string', 'max' => 20],
            [['name'], 'unique'],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_employee' => 'id_employee']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_group' => 'Grupo',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'id_group_parent' => 'Grupo padre',
            'child_groups' => 'Grupos que engloba',
            'id_clinic' => 'Clínica',
            'clinic_excluded' => 'Excluidas?',
            'id_area' => 'Área',
            'associated_tb' => 'Tabla asociada',
            'id_employee' => 'Empleado',
            'is_archived' => 'Archivado?',
            'date_start' => 'Fecha Inicio',
            'date_end' => 'Fecha Fin',
            'created_by' => 'Creado por',
            'created_at' => 'Creado a las',
            'updated_by' => 'Actualizado por',
            'updated_at' => 'Actualizado a las',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_by = Yii::$app->user->identity->clinicEmployee->id_employee;
                $this->created_at = date('Y-m-d H:i:s', time());
            }else {
                $this->updated_by = Yii::$app->user->identity->clinicEmployee->id_employee;
                $this->updated_at = date('Y-m-d H:i:s', time());
            }
            $this->id_area = Json::encode($this->id_area);
            $this->id_clinic = Json::encode($this->id_clinic);
            $this->date_start ? $this->date_start = date('Y-m-d', strtotime($this->date_start)) : '';
            $this->date_end ? $this->date_end = date('Y-m-d', strtotime($this->date_end)) : '';
            Yii::$app->admin->addLog('Message',Json::encode($this));
            return true;
        }else{
            return false;
        }
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->id_clinic = Json::decode($this->id_clinic);
        $this->id_area = Json::decode($this->id_area);
        $this->date_start ? $this->date_start = date('d-m-Y', strtotime($this->date_start)) : '';
        $this->date_end ? $this->date_end = date('d-m-Y', strtotime($this->date_end)) : '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id_employee' => 'id_employee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupParent()
    {
        return $this->hasOne(Groups::className(), ['id_group' => 'id_group_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['id_group_parent' => 'id_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Employee::className(), ['id_employee' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Employee::className(), ['id_employee' => 'updated_by']);
    }

    public static function getDropDownList($associated_tb,$id=null)
    {
        $query = Groups::find()
            ->andFilterWhere(['associated_tb'=>$associated_tb, 'is_archived'=>0])

            ->andWhere(['or',
                ['<=', 'date_start',date('Y-m-d', strtotime('Today'))],
                ['date_start'=>null],
            ])
            ->andWhere(['or',
                ['>=', 'date_end',date('Y-m-d 23:59:59', strtotime('Today'))],
                ['date_end'=>null],
            ])
            ->andWhere(['id_group_parent'=>null]);

        if ($id) {
            $query->andFilterWhere(['<>', 'id_group',$id]);
        }

        return ArrayHelper::map($query->all(), 'id_group', 'name');
    }


    public static function getDropDownListParents($associated_tb)
    {
        return ArrayHelper::map(Groups::find()
            ->select('gp.id_group id_group, gp.name name')
            ->andFilterWhere(['groups.associated_tb'=>$associated_tb, 'groups.is_archived'=>0, 'gp.is_archived'=>0])
            ->andWhere(['not',['groups.id_group_parent'=>null]])
            ->andWhere(['or',
                ['<=', 'groups.date_start',date('Y-m-d', strtotime('Today'))],
                ['groups.date_start'=>null],
            ])
            ->andWhere(['or',
                ['>=', 'groups.date_end',date('Y-m-d 23:59:59', strtotime('Today'))],
                ['groups.date_end'=>null],
            ])
            ->andWhere(['or',
                ['<=', 'gp.date_start',date('Y-m-d', strtotime('Today'))],
                ['gp.date_start'=>null],
            ])
            ->andWhere(['or',
                ['>=', 'gp.date_end',date('Y-m-d 23:59:59', strtotime('Today'))],
                ['gp.date_end'=>null],
            ])
            ->groupBy('groups.id_group_parent')
            ->innerJoin(['gp'=>'groups'], 'gp.id_group = groups.id_group_parent')
            ->all(Yii::$app->db),
            'id_group', 'name');
    }
}
