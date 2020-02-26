<?php

$permisos =[
    [
        NOMBRE => 'imprimir-evaluación-médica',
        RUTA => '/historical/patient-visit/print-medical-evaluation',
        'sub' => [
            [
                NOMBRE => 'subir-fichero-valoración',
                RUTA => '/redactor/upload/file',
            ],
            [
                NOMBRE => 'imagen-manager-valoración',
                RUTA => '/redactor/upload/image-json',
            ],
            [
                NOMBRE => 'subir-imagen-valoración',
                RUTA => '/redactor/upload/image',
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
