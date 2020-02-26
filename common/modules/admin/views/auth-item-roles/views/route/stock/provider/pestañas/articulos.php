<?php

$permisos =[
    [
        NOMBRE => 'añadir-articulo-proveedor',
        RUTA => '/resources/resource-provider/form-ajax',
    ],
    [
        NOMBRE => 'ver-recurso-proveedor',
        RUTA => '/resources/resource/view',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>