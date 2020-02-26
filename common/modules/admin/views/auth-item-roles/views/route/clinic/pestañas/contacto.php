<?php

$permisos =[
    [
        NOMBRE => 'listado-de-telefonos-de-la-clínica',
        RUTA => '/people/phone/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-telefono-de-la-clínica',
                RUTA => '/people/phone/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'listado-de-direcciones-de-la-clínica',
        RUTA => '/people/address/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-dirección-de-la-clínica',
                RUTA => '/people/address/form-widget',
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
