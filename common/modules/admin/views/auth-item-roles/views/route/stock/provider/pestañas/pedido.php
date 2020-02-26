<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-pedido',
        RUTA => '/financials/order/create-direct',
    ],
    [
        NOMBRE => 'ver-pedido-proveedor',
        RUTA => '/financials/order/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-pedido-proveedor',
                RUTA => '/financials/order/update',
            ],
            [
                NOMBRE => 'imprimir-pedido-proveedor',
                RUTA => '/financials/order/print',
            ],
            [
                NOMBRE => 'confirmar-pago-pedido-proveedor',
                RUTA => '/financials/order/pay',
            ],
            [
                NOMBRE => 'añadir-artículo-pedido-proveedor',
                RUTA => '/financials/order/received',
            ],
            [
                NOMBRE => 'pestaña-artículos-del-pedido',
                RUTA => '/financials/order/update',
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

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'orderTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Artículos del pedido',
            CONTENT => Yii::$app->view->render('order-lines', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>