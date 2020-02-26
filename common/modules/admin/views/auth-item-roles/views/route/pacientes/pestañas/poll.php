<?php

$permisos =[
    [
        NOMBRE => 'listado-de-encuestas',
        RUTA => '/documents/document/view',
        'sub' => [
            [
                NOMBRE => 'enviar-encuesta-por-correo-añadir-encuesta',
                RUTA => '/documents/document-instance/add',
            ],
            [
                NOMBRE => 'ver-encuestas-creadas',
                RUTA => '/documents/document-instance/view',
            ],
            [
                NOMBRE => 'ver-información-de-la-encuesta',
                RUTA => '/documents/document-instance/view-ajax',
            ],
            [
                NOMBRE => 'editar-encuesta',
                RUTA => '/documents/document-instance/form-widget',
            ],
            [
                NOMBRE => 'imprimir-encuesta',
                RUTA => '/documents/document-instance/print',
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
