<?php

$permisos =[
    [
        NOMBRE => 'listado-programar-envíos-de-renovación',
        RUTA => '/communication/communication-config/index',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-programar-envíos-de-renovación',
                RUTA => '/communication/communication-config/form-ajax',
            ],
            [
                NOMBRE => 'ver-programar-envíos-de-renovación',
                RUTA => '/communication/communication-config/view',
            ],
            [
                NOMBRE => 'actualizar-programar-envíos-de-renovación',
                RUTA => '/communication/communication-config/form-ajax',
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
