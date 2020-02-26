<?php

$permisos =[
    [
        NOMBRE => 'crear-tipo-cita',
        RUTA => '/treatments/visit-type/create',
        'sub' => [
            [
                NOMBRE => 'ver-tipo-cita',
                RUTA => '/treatments/visit-type/view',
            ],
            [
                NOMBRE => 'actualizar-tipo-cita',
                RUTA => '/treatments/visit-type/update',
            ],
            [
                NOMBRE => 'borrar-tipo-cita',
                RUTA => '/treatments/visit-type/delete',
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
