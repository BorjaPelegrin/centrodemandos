<?php

namespace common\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * Permission form
 */
class PermissionForm extends Model
{
    public $route;
    public $id_user;
    public $id_role;
    public $allow;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'id_user', 'id_role', 'allow'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'route' => 'Ruta',
            'id_user' => 'Usuario',
            'id_role' => 'Role',
            'allow' => 'Permitir'
        ];
    }

    public function checkPermissionRole()
    {
        $item = AuthItemChild::find()->where([
            'parent' => $this->id_role,
            'child' => $this->route
        ])->one();

        if (!is_null($item)) {
            return true;
        }

        return false;
    }

    public function save()
    {
        $this->save();
    }
}
