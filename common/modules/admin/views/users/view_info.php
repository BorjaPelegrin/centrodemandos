<?php
use yii\helpers\Html;

$roles = Yii::$app->authManager->getRolesByUser($model->id);
$r = '';
foreach ($roles as $role) {
    //var_dump($role);
    $r .= Html::a($role->description, ['/admin/auth-item-roles/list-permissions', 'id'=>$role->name], [
        'class' => 'link-role'
    ]).'<br>';
}
$permissions = Yii::$app->authManager->getPermissionsByUser($model->id);
$p = '';
foreach ($permissions as $permission) {
    //var_dump($permission);
    $p .= $permission->name.'<br>';
}

$this->registerJs('
    $(\'.link-role\').on(\'click\', function(e) {
        e.preventDefault();
        var action = $(this).attr("href");
        $.ajax({
            url: action,
            type: "get",
            beforeSend : function() {
                $("#permissions").html("Cargando...");
            },
            success: function (data) {
                $("#permissions").html(data);
            },
            error: function (e) {
                console.log(e);
                krajeeDialog.alert("<div class=\"alert alert-danger\">Se ha producido un error, a continuación se muestra el detalle del error: </div>"+e.responseText);
            }
        });
    });
', \yii\web\view::POS_READY);

$this->registerCss('
.roles {
    height: 300px;
    overflow: auto;
}
');
?>

<div class="row">
    <div class="col-md-6">
        <strong>Nombre de usuario: </strong><?= $model->username ?>
        <br>
        <strong>Email: </strong><?= $model->email ?>
        <br>
        <strong>Nombre empleado: </strong><?= $model->idEmployee ? $model->idEmployee->fullName : 'No asignado' ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <strong>Roles:</strong> <br>
        <div class="roles">
            <?= Html::a('Todos los roles', ['/admin/auth-item-roles/list-permissions', 'user_id'=>$model->id], [
                'class' => 'link-role'
            ]) ?>
            <br>
            <?= $r ? $r : 'No tiene roles asignados' ?>
        </div>
    </div>
    <div class="col-md-6">
        <strong>Permisos:</strong> <br>
        <div id="permissions" class="roles">
            <?= $p ? : 'No tiene permisos asignados'; ?>
        </div>
    </div>
</div>


