<?php

$permisos =[
    [
        NOMBRE => 'añadir-clínica',
        RUTA => '/treatments/clinic-treatment/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-clinic-treatment',
                RUTA => '/treatments/clinic-treatment/view',
            ],
            [
                NOMBRE => 'ver-clinica',
                RUTA => '/clinic/clinic/view',
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
