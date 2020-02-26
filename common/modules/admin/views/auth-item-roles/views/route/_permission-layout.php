<?php

$this->registerJs('
    $(\'input\').on(\'change\', function(e) {
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: "' . \yii\helpers\Url::to(['/admin/permission/update-permission']) . '",
            type: "POST",
            data: formData,
            success: function (data) {
                if (data == "Error") {
                    alert("Hay un error");
                } else {
                    
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    });
',\yii\web\View::POS_READY);

?>
<?php if($route && $url) {
    ?>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-sm-6 col-md-6">
            <div class="bg-primary active">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <strong>ROUTE:</strong>
                    </div>
                    <div class="col-sm-9 col-md-9">
                        <?= $route ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 pull-right">
            <div class="bg-primary disabled" style="text-align: center">
                <span><strong>URL:</strong> <?= $url ?> </span>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
foreach ($permisos as $permiso){
    ?>
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <h4> <?= ucfirst(str_replace("-"," ",$permiso['nombre'])) ?> </h4>
        </div>
        <div class="col-sm-10 col-md-10">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sn-12 col-md-12">
            <?php
            $permission = new \common\modules\admin\models\PermissionForm();
            $permission->id_role = $parent;
            $permission->route = $permiso['ruta'];
            $permission->allow = $permission->checkPermissionRole();
            echo Yii::$app->view->render('@modules/admin/views/permissions/forms/_checkbox', [
                'model' => $permission,
                'id' => $permiso['nombre'],
                'comentario' => $permiso['comentario']
            ]);
            ?>
        </div>
        <?php
        foreach ($permiso['sub'] as $subPermiso) {
            ?>
            <div class="col-sm-4 col-md-4">
                <?php
                $permission = new \common\modules\admin\models\PermissionForm();
                $permission->id_role = $parent;
                $permission->route = $subPermiso['ruta'];
                $permission->allow = $permission->checkPermissionRole();
                echo Yii::$app->view->render('@modules/admin/views/permissions/forms/_checkbox', [
                    'model' => $permission,
                    'id' => $subPermiso['nombre']
                ]);
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <br>
    <?php
}
?>
