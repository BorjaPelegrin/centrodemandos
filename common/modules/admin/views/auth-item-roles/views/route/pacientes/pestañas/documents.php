<?php

$permisos =[
    [
        NOMBRE => 'listado-de-formularios',
        RUTA => '/documents/document-instance/view',
        'sub' => [
            [
                NOMBRE => 'añadir-editar-formularios',
                RUTA => '/documents/document-instance/form-widget',
            ],
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
