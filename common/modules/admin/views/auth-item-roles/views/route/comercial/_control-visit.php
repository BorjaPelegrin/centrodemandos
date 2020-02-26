<?php
$permisos =[
    [
        NOMBRE => 'imprimir-control-de-visitas',
        RUTA => '/bi/control-visits/print',
    ],
    [
        NOMBRE => 'imprimir-control-de-visitas-solicitudes',
        RUTA => '/bi/control-visits/print-lead',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/control-visits/index',
    'url' => 'http://backend.minerva.lan/bi/grid/index',
]);
?>