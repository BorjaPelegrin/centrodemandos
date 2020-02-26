<?php

$permisos =[
    [
        NOMBRE => 'añadir-incidencia',
        RUTA => '/stock/incident/create',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'stock/incident/index',
    'url' => 'http://backend.minerva.lan/stock/incident/index',
]);
?>
