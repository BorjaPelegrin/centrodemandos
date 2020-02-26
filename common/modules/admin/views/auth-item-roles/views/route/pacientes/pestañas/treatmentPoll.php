<?php

$permisos =[
    [
        NOMBRE => 'ver-encuestas-enviadas',
        RUTA => '/documents/document-instance/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-encuesta-enviar-encuesta-por-correo',
                RUTA => '/documents/document-instance/add',
            ],
            [
                NOMBRE => 'actualizar-encuesta',
                RUTA => '/documents/document-instance/form-widget',
            ],
            [
                NOMBRE => 'ver-resultado-encuesta',
                RUTA => '/documents/document-instance/view-ajax',
            ],
            [
                NOMBRE => 'imprimir-encuesta-tratamiento',
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
