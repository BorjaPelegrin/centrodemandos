<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'compras-ver-pedido-proveedor',
        RUTA => '/financials/order/view',
        'sub' => [
            [
                NOMBRE => 'compras-imprimir-pedido-proveedor',
                RUTA => '/financials/order/print',
            ],
            [
                NOMBRE => 'compras-confirmar-pago-pedido-proveedor',
                RUTA => '/financials/order/pay',
            ],
            [
                NOMBRE => 'compras-añadir-artículo-pedido-proveedor',
                RUTA => '/financials/order/received',
            ],
            [
                NOMBRE => 'compras-pestaña-artículos-del-pedido',
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
        'id' => 'orderCompraTabs',
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