<?php

$auth = \Yii::$app->authManager;
$roles = $auth->getRolesByUser($idUser);
$permissions = $auth->getPermissionsByRole($model->name);
?>

<div class="row">
    <div class="col-md-2">
        Nombre
    </div>
    <div class="col-md-2">
        Listado
    </div>
    <div class="col-md-2">
        Ver
    </div>
    <div class="col-md-2">
        Crear
    </div>
    <div class="col-md-2">
        Actualizar
    </div>
    <div class="col-md-2">
        Eliminar
    </div>
</div>

<?php

$cont = 0;
foreach ($permissions as $permission) {
    $newmodel = new \common\modules\admin\models\PermissionForm();

    $newmodel->id_role = $model->name;

    echo Yii::$app->view->render('@common/modules/admin/views/permission/forms/_form', [
        'model' => $newmodel,
        'route' => $permission->name,
        'id' => $cont
    ]);
    $cont++;
}

?>