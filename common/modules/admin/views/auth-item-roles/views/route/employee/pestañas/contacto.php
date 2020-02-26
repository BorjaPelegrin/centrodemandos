<?php

$permisos =[
    [
        NOMBRE => 'listado-de-telefonos-del-empleado',
        RUTA => '/people/phone/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-telefono',
                RUTA => '/people/phone/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'listado-de-direcciones-del-empleado',
        RUTA => '/people/address/view',
        'sub' => [
            [
                NOMBRE => 'añadir-actualizar-dirección',
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
