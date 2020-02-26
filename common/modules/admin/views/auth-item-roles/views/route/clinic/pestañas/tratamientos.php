<?php

$permisos =[
    [
        NOMBRE => 'listado-de-tratamientos-de-la-clinica',
        RUTA => '/treatments/clinic-treatment/view',
        'sub' => [
            [
                NOMBRE => 'asignar-los-tratamientos-creados',
                RUTA => '/clinic/clinic/treatments-to-clinics',
            ],
            [
                NOMBRE => 'añadir-tratamiento',
                RUTA => '/treatments/clinic-treatment/form-ajax',
            ],
            [
                NOMBRE => 'ver-tratamiento',
                RUTA => '/treatments/treatment/view',
            ],
            [
                NOMBRE => 'borrar-tratamiento',
                RUTA => '/treatments/treatment/delete',
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
