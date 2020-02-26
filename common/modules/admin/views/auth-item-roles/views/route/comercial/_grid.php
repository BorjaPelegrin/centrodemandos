<?php
$permisos =[
    [
        NOMBRE => 'nuevo-registro',
        RUTA => '/bi/grid/new-values',
        'sub' => [
            [
                NOMBRE => 'actualizar-registro',
                RUTA => '/bi/grid/save-values',
            ]
        ]
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/grid/index',
    'url' => 'http://backend.minerva.lan/bi/grid/index',
]);
?>