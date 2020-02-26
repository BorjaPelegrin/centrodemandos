<?php

$permisos =[
    [
        NOMBRE => 'listado-de-áreas-de-la-clínica',
        RUTA => '/treatments/clinic-area/view',
        'sub' => [
            [
                NOMBRE => 'asignar-nueva-área',
                RUTA => '/treatments/clinic-area/create-ajax',
            ],
            [
                NOMBRE => 'borrar-área-de-la-clínica',
                RUTA => '/treatments/clinic-area/delete',
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
