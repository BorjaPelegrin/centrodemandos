<?php
$cont = 0;
foreach ($permissions as $route) {
    $permission = new \common\modules\admin\models\PermissionForm();
    //$permission->id_user = $idUser;
    $permission->id_role = $model->name;
    $permission->route = $route->name;
    $permission->allow = $permission->checkPermissionRole();
    /*echo Yii::$app->view->render('@modules/admin/views/permissions/forms/_select', [
        'action' => $route->name . '/' . $route->description,
        'model' => $permission,
        'id' => $module.$cont
    ]);*/
    $cont++;
}
?>
