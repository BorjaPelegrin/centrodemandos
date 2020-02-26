<?php

$permisos =[
    [
        NOMBRE => 'ver-formulario-donación-ovulos',
        RUTA => '/documents/form-donacion-ovo/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-donación-ovulos',
                RUTA => '/documents/form-donacion-ovo/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-donación-semen',
        RUTA => '/documents/form-donacion-sem/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-donación-semen',
                RUTA => '/documents/form-donacion-sem/form-ajax',
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
