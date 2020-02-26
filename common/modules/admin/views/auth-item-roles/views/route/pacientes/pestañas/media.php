<?php

$permisos =[
    [
        NOMBRE => 'listado-de-archivos',
        RUTA => '/media/media/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-archivo',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'ver-archivo',
                RUTA => '/media/media/view-ajax',
            ],
            [
                NOMBRE => 'borrar-archivo',
                RUTA => '/media/media/delete',
            ],
            [
                NOMBRE => 'actualizar-archivo',
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
