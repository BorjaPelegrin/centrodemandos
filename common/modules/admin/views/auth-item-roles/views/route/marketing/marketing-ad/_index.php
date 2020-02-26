<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'actualizar-anuncio-anuncios',
        RUTA => '/marketing/marketing-ad/update',
        'sub' => [
            [
                NOMBRE => 'ver-anuncio-anuncios',
                RUTA => '/marketing/marketing-ad/view',
            ],
        ],
    ],
    [
        NOMBRE => 'pestañas-de-los-anuncios',
        RUTA => 'ad_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-contenidos-mensuales-anuncio',
                RUTA => 'tabMonthContentAd',
            ],
            [
                NOMBRE => 'pestaña-solicitudes-anuncio',
                RUTA => 'tabLeadsAd',
            ],
            [
                NOMBRE => 'pestaña-pacientes-anuncio',
                RUTA => 'tabPatientAd',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'marketing/marketing-ad/index',
    'url' => 'http://backend.minerva.lan/marketing/ad/index',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'marketingAdTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Contenidos mensuales',
            CONTENT => Yii::$app->view->render('pestañas/contenidos-mensuales', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Solicitudes',
            CONTENT => Yii::$app->view->render('pestañas/solicitudes', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Pacientes',
            CONTENT => Yii::$app->view->render('pestañas/pacientes', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
    ],
]) ?>
