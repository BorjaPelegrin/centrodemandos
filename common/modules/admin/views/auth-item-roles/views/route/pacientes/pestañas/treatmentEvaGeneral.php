<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'todas-las-pestañas-del-ciclo',
        RUTA => 'tabEvaGeneral',
        'sub' => [
            [
                NOMBRE => 'pestaña-información-del-ciclo',
                RUTA => 'tabGeneralCiclos',
            ],
            [
                NOMBRE => 'pestaña-donación-de-gametos',
                RUTA => 'tabDonationCiclos',
            ],
            [
                NOMBRE => 'pestaña-medicación',
                RUTA => 'tabMedicationCiclos',
            ],
            [
                NOMBRE => 'pestaña-calendario-de-ciclo',
                RUTA => 'tabCalendarCiclos',
            ],
            [
                NOMBRE => 'pestaña-laboratorio',
                RUTA => 'tabLaboratoryCiclos',
            ],
            [
                NOMBRE => 'pestaña-resultado-del-ciclo',
                RUTA => 'tabTracingCiclos',
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
        'id' => 'patientTreatmentCicloTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Información general',
            CONTENT => Yii::$app->view->render('evaGeneralInfo', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Donación de gametos',
            CONTENT => Yii::$app->view->render('evaGeneralDonacion', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Medicación',
            CONTENT => Yii::$app->view->render('evaGeneralMedicacion', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Calendario de ciclo',
            CONTENT => Yii::$app->view->render('evaGeneralCalendario', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Laboratorio',
            CONTENT => Yii::$app->view->render('evaGeneralLaboratorio', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Resultado del ciclo',
            CONTENT => Yii::$app->view->render('evaGeneralResultado', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>