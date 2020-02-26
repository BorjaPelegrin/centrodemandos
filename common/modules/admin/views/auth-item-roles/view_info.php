<?php
use yii\helpers\Html;

$permissions = Yii::$app->authManager->getPermissionsByRole($model->name);
$p = '';
foreach ($permissions as $permission) {
    //var_dump($permission);
    $p .= $permission->name.'<br>';
}

$this->registerCss('
.roles {
    height: 300px;
    overflow: auto;
}
');
?>

<div class="row">
    <div class="col-md-6">
        <strong>Role:</strong> <br>
        <div class="roles">
            <?= $model->description ?>
        </div>
    </div>
    <div class="col-md-6">
        <strong>Permisos:</strong> <br>
        <div id="permissions" class="roles">
            <?= $p ? : 'No tiene permisos asignados'; ?>
        </div>
    </div>
</div>


