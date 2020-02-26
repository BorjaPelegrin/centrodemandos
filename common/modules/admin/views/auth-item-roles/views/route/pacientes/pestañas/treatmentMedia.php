<?php

$permisos =[
    [
        NOMBRE => 'listado-de-archivos-del-tratamiento',
        RUTA => '/media/media/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-archivo-al-tratamiento',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'ver-archivo-del-tratamiento',
                RUTA => '/media/media/view-ajax',
            ],
            [
                NOMBRE => 'borrar-archivo-del-tratamiento',
                RUTA => '/media/media/delete',
            ],
            [
                NOMBRE => 'actualizar-archivo-del-tratamiento',
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
