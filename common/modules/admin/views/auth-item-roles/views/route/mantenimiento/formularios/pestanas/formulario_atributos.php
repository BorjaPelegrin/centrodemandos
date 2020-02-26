<?php

$permisos =[
    [
        NOMBRE => 'añadir-atributo-formulario',
        RUTA => '/documents/document-attribute/create',
        'sub' => [
            [
                NOMBRE => 'ver-atributo-formulario',
                RUTA => '/documents/document-attribute/view',
            ],
            [
                NOMBRE => 'actualizar-atributo-formulario',
                RUTA => '/documents/document-attribute/update',
            ],
            [
                NOMBRE => 'borrar-atributo-formulario',
                RUTA => '/documents/document-attribute/delete',
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
