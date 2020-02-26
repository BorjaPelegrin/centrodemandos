<?php

namespace common\modules\admin\models;

use Yii;

/**
 * This is the model class for table "yii_user_type_roles".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $associated_tb
 * @property integer $associated_id
 * @property string $roles
 */
class UserTypeRoles extends \yii\db\ActiveRecord
{
    public $modelsRole;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user_type_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'associated_id'], 'integer'],
            [['roles'], 'string'],
            [['associated_tb'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'associated_tb' => 'Associated Tb',
            'associated_id' => 'Associated ID',
            'roles' => 'Roles',
        ];
    }

    public function afterFind()
    {
        parent::afterFind();

        $auth = Yii::$app->authManager;
        if (!is_null($this->roles) && !empty($this->roles)) {
            $roles = explode(',', $this->roles);
            $allRoles = [];
            foreach ($roles as $name) {
                $role = $auth->getRole($name);
                array_push($allRoles, $role);
            }
        }

        $this->modelsRole = $allRoles;
    }

    public function addRole($item)
    {
        $roles = explode(',', $this->roles);
        // Todo: si el role existe no se debe repetir
        $roles [] = $item;
        $this->roles = implode($roles,',');
        $this->save();
    }

    public function deleteRole($item)
    {
        $roles = explode(',', $this->roles);
        $i = array_search($item, $roles);
        unset($roles[$i]);
        $this->roles = implode($roles,',');
        $this->save();
    }
}
