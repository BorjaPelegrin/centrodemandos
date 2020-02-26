<?php

$permisos =[
    [
        NOMBRE => 'listado-pedidos-del-tratamiento',
        RUTA => '/financials/order/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-pedido',
                RUTA => '/financials/order/form-ajax',
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
