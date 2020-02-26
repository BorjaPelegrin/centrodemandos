<?php

$permisos =[
    [
        NOMBRE => 'añadir-recurso',
        RUTA => '/stock/resource-operation/create',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
