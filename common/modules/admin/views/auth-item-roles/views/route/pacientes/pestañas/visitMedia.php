<?php

$permisos =[
    [
        NOMBRE => 'ver-archivos-subidos',
        RUTA => '/media/media/view',
        'sub' => [
            [
                NOMBRE => 'botón-ver-archivo',
                RUTA => '/media/media/view-ajax',
            ],
            [
                NOMBRE => 'botón-subir-un-archivo',
                RUTA => '/media/media/form-widget',
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
