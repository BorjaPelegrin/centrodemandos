<?php

$permisos =[
    [
        NOMBRE => 'añadir-motivo-de-baja',
        RUTA => '/historical/treatment-closing-reason/create',
        'sub' => [
            [
                NOMBRE => 'ver-motivo-de-baja',
                RUTA => '/historical/treatment-closing-reason/view',
            ],
            [
                NOMBRE => 'actualizar-motivo-de-baja',
                RUTA => '/historical/treatment-closing-reason/update',
            ],
            [
                NOMBRE => 'borrar-motivo-de-baja',
                RUTA => '/historical/treatment-closing-reason/delete',
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
