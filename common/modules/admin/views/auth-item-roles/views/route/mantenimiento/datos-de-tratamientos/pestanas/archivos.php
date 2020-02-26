<?php

$permisos =[
    [
        NOMBRE => 'listado-de-archivos-tratamientos',
        RUTA => '/media/media/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-archivo-tratamientos',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'ver-archivo-tratamientos',
                RUTA => '/media/media/view-ajax',
            ],
            [
                NOMBRE => 'borrar-archivo-tratamientos',
                RUTA => '/media/media/delete',
            ],
            [
                NOMBRE => 'actualizar-archivo-tratamiento',
                RUTA => '/media/media/update-ajax',
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
