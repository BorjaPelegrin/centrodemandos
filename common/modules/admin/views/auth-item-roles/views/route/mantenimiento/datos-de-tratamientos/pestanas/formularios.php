<?php

$permisos =[
    [
        NOMBRE => 'añadir-formulario',
        RUTA => '/documents/treatment-document/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-formulario-tratamiento',
                RUTA => '/documents/treatment-document/form-ajax',
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
