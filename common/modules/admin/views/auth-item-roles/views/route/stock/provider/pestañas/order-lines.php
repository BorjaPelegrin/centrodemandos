<?php

$permisos =[
    [
        NOMBRE => 'actualizar-cantidad-recibida',
        RUTA => '/financials/order-line/update-received-quantity',
        'sub' => [
            [
                NOMBRE => 'borrar-línea-del-pedido',
                RUTA => '/financials/order-line/delete',
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
