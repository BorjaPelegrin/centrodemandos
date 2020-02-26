<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-proveedor',
        RUTA => '/stock/provider/create',
        'sub' => [
            [
                NOMBRE => 'ver-proveedor',
                RUTA => '/stock/provider/view',
            ],
            [
                NOMBRE => 'actualizar-proveedor',
                RUTA => '/stock/provider/update',
            ],
            [
                NOMBRE => 'activar-desactivar-proveedor',
                RUTA => '/stock/provider/change-to-archived',
            ],
            [
                NOMBRE => 'realizar-pedido',
                RUTA => '/financials/order/create-direct',
            ],
            [
                NOMBRE => 'seleccionar-clínica-proveedor',
                RUTA => '/stock/provider/select-clinic',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-pestañas-del-proveedor',
        RUTA => '	provider_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-contactos-proveedor',
                RUTA => 'tabContactsProvider',
            ],
            [
                NOMBRE => 'pestaña-personas-contactos-proveedor',
                RUTA => 'tabPeopleContactsProvider',
            ],
            [
                NOMBRE => 'pestaña-artículos-proveedor',
                RUTA => 'tabResourcesProvider',
            ],
            [
                NOMBRE => 'pestaña-pedidos-proveedor',
                RUTA => 'tabOrdersProvider',
            ],
            [
                NOMBRE => 'pestaña-factura-proveedor',
                RUTA => 'tabBillProvider',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'stock/provider/index',
    'url' => 'http://backend.minerva.lan/stock/provider/index',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'providerTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Contactos',
            CONTENT => Yii::$app->view->render('pestañas/contacto', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Personas Contactos',
            CONTENT => Yii::$app->view->render('pestañas/personas-contacto', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Artículos',
            CONTENT => Yii::$app->view->render('pestañas/articulos', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Pedidos',
            CONTENT => Yii::$app->view->render('pestañas/pedido', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Facturas',
            CONTENT => Yii::$app->view->render('pestañas/facturas', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>

