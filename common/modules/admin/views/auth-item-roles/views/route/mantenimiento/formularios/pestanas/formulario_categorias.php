<?php

$permisos =[
    [
        NOMBRE => 'añadir-categoría-formulario',
        RUTA => '/documents/document-category/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-categoria-formulario',
                RUTA => '/documents/document-category/view',
            ],
            [
                NOMBRE => 'actualizar-categoria-formulario',
                RUTA => '/documents/document-category/update',
            ],
            [
                NOMBRE => 'borrar-categoria-formulario',
                RUTA => '/documents/document-category/delete',
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
