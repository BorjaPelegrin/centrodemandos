<?php

$permisos =[
    [
        NOMBRE => 'plantillas-SQL',
        RUTA => '/bi/bi-template/index',
        'sub' => [
            [
                NOMBRE => 'ver-plantilla-SQL',
                RUTA => '/bi/bi-template/view',
            ],
        ],
    ],
    [
        NOMBRE => 'exportal-excel',
        RUTA => '/bi/bi-template/export-to-excel',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/sql/index',
    'url' => 'http://backend.minerva.lan/bi/sql/index',
]);
?>
