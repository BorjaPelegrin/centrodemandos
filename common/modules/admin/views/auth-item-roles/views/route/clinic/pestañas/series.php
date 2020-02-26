<?php

$permisos =[
    [
        NOMBRE => 'listado-de-las-series-de-la-clínica',
        RUTA => '/billing/clinic-serie/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-series',
                RUTA => '/clinic/clinic/create-all-series',
            ],
            [
                NOMBRE => 'ver-serie',
                RUTA => '/billing/serie/view',
            ],
            [
                NOMBRE => 'actualizar-serie',
                RUTA => '/billing/serie/update',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
