<?php

$permisos =[
    [
        NOMBRE => 'ver-formularios-requeridos-del-tratamiento',
        RUTA => '/documents/document-instance/form-widget',
    ],
    [
        NOMBRE => 'listado-de-formularios-del-tratamiento',
        RUTA => '/documents/document-instance/view',
        'sub' => [
            [
                NOMBRE => 'añadir-editar-formularios-del-tratamiento',
                RUTA => '/documents/document-instance/form-widget',
            ],
            [
                NOMBRE => 'botón-imprimir-formulario-del-tratamiento',
                RUTA => '/documents/document-instance/print',
            ],
            [
                NOMBRE => 'botón-borrar-formulario-del-tratamiento',
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
