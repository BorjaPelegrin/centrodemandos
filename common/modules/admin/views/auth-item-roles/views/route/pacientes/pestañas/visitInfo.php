<?php

$permisos =[
    [
        NOMBRE => 'subir-fichero-visita',
        RUTA => '/redactor/upload/file',
        'sub' => [
            [
                NOMBRE => 'imagen-manager-visita',
                RUTA => '/redactor/upload/image-json',
            ],
            [
                NOMBRE => 'subir-imagen-visita',
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
