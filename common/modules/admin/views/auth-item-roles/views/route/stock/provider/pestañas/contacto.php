<?php

$permisos =[
    [
        NOMBRE => 'listado-de-telefonos-del-proveedor',
        RUTA => '/people/phone/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-telefono-del-proveedor',
                RUTA => '/people/phone/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'listado-de-direcciones-del-proveedor',
        RUTA => '/people/address/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-dirección-del-proveedor',
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
