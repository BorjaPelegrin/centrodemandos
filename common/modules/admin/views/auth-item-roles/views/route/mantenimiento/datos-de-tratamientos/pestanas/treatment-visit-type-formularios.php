<?php

$permisos =[
    [
        NOMBRE => 'añadir-formulario-sesion',
        RUTA => '/documents/treatment-visit-type-document/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-estructura-formulario',
                RUTA => '/documents/document/view',
            ],
            [
                NOMBRE => 'eliminar-formulario-sesion',
                RUTA => '/documents/treatment-visit-type-document/delete',
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
