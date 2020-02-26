<?php

$permisos =[
    [
        NOMBRE => 'botón-vendido',
        RUTA => '/historical/patient-treatment/vendido',
        'sub' => [
            [
                NOMBRE => 'botón-validado',
                RUTA => '/historical/patient-treatment/validate',
            ],
            [
                NOMBRE => 'botón-dar-de-baja',
                RUTA => '/historical/patient-treatment/dar-baja-tratamiento',
            ],
            [
                NOMBRE => 'subir-ficheros-de-la-baja',
                RUTA => '/media/media/file-upload-ajax',
            ],
            [
                NOMBRE => 'botón-finalizado',
                RUTA => '/historical/patient-treatment/finalizado',
            ],
            [
                NOMBRE => 'adjuntar-documentación',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'ver-documentación',
                RUTA => '/media/media/view-ajax',
            ],
            [
                NOMBRE => 'botón-cambio-tratamiento-parte1',
                RUTA => '/historical/patient-treatment/cambiar-tratamiento',
            ],
            [
                NOMBRE => 'botón-cambio-tratamiento-parte-2',
                RUTA => '/historical/patient-treatment/continue-to-budget',
            ],
            [
                NOMBRE => 'botón-cambio-tratamiento-existente',
                RUTA => '/historical/patient-treatment/cambiar-tratamiento-existente',
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
