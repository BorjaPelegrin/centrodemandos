<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'información-sobre-la-solicitud',
        RUTA => '/people/lead/index',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-cita',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'botón-ver-paciente',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'botones-Teléfono-Enviar-email-y-Sms',
                RUTA => '/people/patient/view',
            ],
        ],
    ],
    [
        NOMBRE => 'pestañas-de-la-solicitud',
        RUTA => 'lead_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-información-solicitud',
                RUTA => 'tabInfoLead',
            ],
            [
                NOMBRE => 'pestaña-observaciones-solicitud',
                RUTA => 'tabCommentLeads',
            ],
            [
                NOMBRE => 'pestaña-citas',
                RUTA => 'tabVisitsLead',
            ],
            /*[
                NOMBRE => 'pestaña-tratamientos',
                RUTA => 'tabTreatmentsLead',
            ],*/
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/lead/view',
    'url' => 'http://backend.minerva.lan/lead/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'patientLeadTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Información',
            CONTENT => Yii::$app->view->render('pestañas/leadInfo', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Observaciones',
            CONTENT => Yii::$app->view->render('pestañas/leadComment', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        /*[
            LABEL => 'Citas',
            CONTENT => Yii::$app->view->render('pestañas/leadVisit', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Tratamientos',
            CONTENT => Yii::$app->view->render('pestañas/leadTreatment', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],*/
    ],
]) ?>


