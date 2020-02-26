<?php

$permisos =[
    [
        NOMBRE => 'añadir-emails-de-clinica',
        RUTA => '/clinic/clinic-emails/create',
        'sub' => [
            [
                NOMBRE => 'ver-emails-de-clinica',
                RUTA => '/clinic/clinic-emails/view',
            ],
            [
                NOMBRE => 'actualizar-emails-de-clinica',
                RUTA => '/clinic/clinic-emails/update',
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
