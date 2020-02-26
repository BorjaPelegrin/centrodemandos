<?php

$permisos =[
    [
        NOMBRE => 'listado-de-formularios-de-la-visita',
        RUTA => '/documents/document-instance/view',
        'sub' => [
            [
                NOMBRE => 'botón-nuevo-actualizar-formulario',
                RUTA => '/documents/document-instance/form-widget',
            ],
            [
                NOMBRE => 'ver-formulario',
                RUTA => '/documents/document-instance/form-widget-subform',
            ],
            /*[
                NOMBRE => 'botón-actualizar-formulario',
                RUTA => '/documents/document-instance/form-widget',
            ],*/
            [
                NOMBRE => 'botón-imprimir-formulario',
                RUTA => '/documents/document-instance/print',
            ],
            [
                NOMBRE => 'botón-borrar-formulario',
                RUTA => '/documents/document-instance/delete',
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
