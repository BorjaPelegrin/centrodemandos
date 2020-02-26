<?php

$permisos =[
    [
        NOMBRE => 'listado-de-incidencias',
        RUTA => '/crm/tickets/view',
        'sub' => [
            [
                NOMBRE => 'añadir-incidencia',
                RUTA => '/crm/tickets/form-ajax',
            ],
            [
                NOMBRE => 'ver-incidencia',
                RUTA => '/crm/tickets/view-ajax',
            ],
            [
                NOMBRE => 'actualizar-incidencia',
                RUTA => '/crm/tickets/form-ajax',
            ],
            /*[
                NOMBRE => 'borrar-incidencia',
                RUTA => '/crm/tickets/delete',
            ],*/
            [
                NOMBRE => 'subir-archivo-de-incidencia',
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
