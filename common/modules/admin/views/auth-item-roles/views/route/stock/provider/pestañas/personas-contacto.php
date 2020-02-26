<?php

$permisos =[
    [
        NOMBRE => 'añadir-actualizar-contacto',
        RUTA => '/stock/provider-contact/form-ajax',
    ],
    [
        NOMBRE => 'ver-contacto-proveedor',
        RUTA => '/stock/provider-contact/view',
        'sub' => [
            [
                NOMBRE => 'activar-desactivar-contacto-proveedor',
                RUTA => '/stock/provider-contact/change-to-archived',
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