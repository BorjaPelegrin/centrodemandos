<?php

namespace common\modules\admin\controllers;

use Yii;
use common\modules\admin\models\AuthItem;
use common\modules\admin\models\AuthItemChild;
use common\modules\admin\models\PermissionForm;

class PermissionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'idUser' => Yii::$app->user->id
        ]);
    }

    public function actionUpdatePermission()
    {
        $model = new PermissionForm();

        if ($model->load(Yii::$app->request->post())) {
            $this->updateModel($model);
        }
        return true;
    }

    public function updateModel($model)
    {
        $item = AuthItem::find()->where([
            'name' => $model->route
        ])->one();
        if (is_null($item)) {
            $item = new AuthItem();
        }
        $item->type = 2;
        $item->name = $model->route;
        if ($item->save()) {
            $permission = AuthItemChild::find()->where([
                'parent' => $model->id_role,
                'child' => $item->name
            ])->one();
            if (is_null($permission)) {
                $permission = new AuthItemChild();
                $permission->parent = $model->id_role;
                $permission->child = $item->name;
                if (!$permission->save()) {
                    var_dump($item->errors);
                }
            } else {
                $permission->delete();
            }
        } else {
            var_dump($item->errors);
        }

        /*if (!$model->delete) {
            $revoke = new AuthItemRevoke();
            $revoke->id_user = $model->id_user;
            $revoke->type = 2;
            $revoke->description = 'Quitar';
            $revoke->name = $model->route.'/delete';
            if (!$revoke->save()) {
                var_dump($revoke->errors);
            }
        }*/
    }
}
