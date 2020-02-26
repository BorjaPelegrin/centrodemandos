<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'ver-pedido',
        RUTA => '/financials/order/view',
        'sub' => [
            [
                NOMBRE => 'realizar-pedido-generico',
                RUTA => '/financials/order/create',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'financials/order/index',
    'url' => 'http://backend.minerva.lan/financials/order/index',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'resourceCompraTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Pedido',
            CONTENT => Yii::$app->view->render('pestañas/pedido', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>