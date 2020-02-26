<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-campaña',
        RUTA => '/marketing/marketing-campaign/create',
        'sub' => [
            [
                NOMBRE => 'actualizar-campaña',
                RUTA => '/marketing/marketing-campaign/update',
            ],
            [
                NOMBRE => 'ver-campaña',
                RUTA => '/marketing/marketing-campaign/view',
            ],
        ],
    ],
    [
        NOMBRE => 'pestañas-de-las-campañas',
        RUTA => 'campaign_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-anuncios-campaña',
                RUTA => 'tabAdCampaign',
            ],
            [
                NOMBRE => 'pestaña-solicitudes-campaña',
                RUTA => 'tabLeadsCampaign',
            ],
            [
                NOMBRE => 'pestaña-pacientes-campaña',
                RUTA => 'tabPatientCampaign',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'marketing/marketing-campaign/index',
    'url' => 'http://backend.minerva.lan/marketing/index',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'marketing-campaignTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Anuncios',
            CONTENT => Yii::$app->view->render('pestañas/anuncios', [
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
