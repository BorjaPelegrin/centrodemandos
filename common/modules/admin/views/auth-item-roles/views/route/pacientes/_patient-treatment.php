<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'botón-actualizar-empleados',
        RUTA => '/historical/patient-treatment/form-ajax',
        'sub' => [
            [
                NOMBRE => 'botón-comentarios-del-tratamiento',
                RUTA => '/historical/patient-treatment/add-comment',
            ],
            [
                NOMBRE => 'botón-imprimir-resumen-del-tratamiento',
                RUTA => '/historical/patient-treatment/print',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-las-pestañas-del-tratamiento',
        RUTA => 'patientTreatment_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-información-del-tratamiento',
                RUTA => 'tabInfoTreatment',
            ],
            [
                NOMBRE => 'pestaña-ciclos',
                RUTA => 'tabCiclosTreatment',
            ],
            [
                NOMBRE => 'pestaña-citas',
                RUTA => 'tabVisitsTreatment',
            ],
            [
                NOMBRE => 'pestaña-formularios',
                RUTA => 'tabDocumentsTreatment',
            ],
            [
                NOMBRE => 'pestaña-archivos',
                RUTA => 'tabMediaTreatment',
            ],
            [
                NOMBRE => 'pestaña-archivos-consentimientos',
                RUTA => 'tabMediaConsentimientos',
            ],
            [
                NOMBRE => 'pestaña-archivos-preoperatorios',
                RUTA => 'tabMediaPreoperatorios',
            ],
            [
                NOMBRE => 'pestaña-archivos-fotos',
                RUTA => 'tabMediaFotos',
            ],
            [
                NOMBRE => 'pestaña-archivos-otros',
                RUTA => 'tabMediaOtros',
            ],
            [
                NOMBRE => 'pestaña-archivos-sesiones',
                RUTA => 'tabMediaSessions',
            ],
            [
                NOMBRE => 'pestaña-presupuestos',
                RUTA => 'tabBudgetsTreatment',
            ],
            [
                NOMBRE => 'pestaña-cobros',
                RUTA => 'tabChargesTreatment',
            ],
            [
                NOMBRE => 'pestaña-pagos',
                RUTA => 'tabPaymentTreatment',
            ],
            [
                NOMBRE => 'pestaña-pedidos',
                RUTA => 'tabOrderTreatment',
            ],
            [
                NOMBRE => 'pestaña-encuesta',
                RUTA => 'tabPollTreatment',
            ],
            [
                NOMBRE => 'pestaña-rentabilidad',
                RUTA => 'tabProfitabilityTreatment',
            ],
            [
                NOMBRE => 'pestaña-estado',
                RUTA => 'tabStateTreatment',
            ],
            [
                NOMBRE => 'pestaña-resultado',
                RUTA => 'tabResultTreatment',
            ],
            [
                NOMBRE => 'pestaña-observaciones-comerciales',
                RUTA => 'tabCommercialReportTreatment',
            ],
            [
                NOMBRE => 'pestaña-diagóstico-online',
                RUTA => 'tabReportOnline',
            ],
            [
                NOMBRE => 'pestaña-informe-médico',
                RUTA => 'tabMedicalReportTreatment',
            ],
            [
                NOMBRE => 'pestaña-recetas',
                RUTA => 'tabPrescriptionTreatment',
            ],
            [
                NOMBRE => 'pestaña-incidencias',
                RUTA => 'tabIncidentTreatment',
            ],
        ],
    ],
];

?>

<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'historical/patient-treatment/view',
    'url' => 'http://backend.minerva.lan/patient/treatment/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'patientTreatmentTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Información del tratamiento',
            CONTENT => Yii::$app->view->render('pestañas/treatmentInfo', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Ciclos',
            CONTENT => Yii::$app->view->render('pestañas/treatmentEvaGeneral', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Citas',
            CONTENT => Yii::$app->view->render('pestañas/treatmentVisits', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Formularios',
            CONTENT => Yii::$app->view->render('pestañas/treatmentDocuments', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Archivos',
            CONTENT => Yii::$app->view->render('pestañas/treatmentMedia', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Presupuestos',
            CONTENT => Yii::$app->view->render('pestañas/treatmentBudgets', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Cobros',
            CONTENT => Yii::$app->view->render('pestañas/treatmentCharges', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Pagos',
            CONTENT => Yii::$app->view->render('pestañas/treatmentPayment', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Pedidos',
            CONTENT => Yii::$app->view->render('pestañas/treatmentOrder', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Encuesta',
            CONTENT => Yii::$app->view->render('pestañas/treatmentPoll', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Rentabilidad',
            CONTENT => Yii::$app->view->render('pestañas/treatmentProfitability', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Estado',
            CONTENT => Yii::$app->view->render('pestañas/treatmentStatus', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Resultado',
            CONTENT => Yii::$app->view->render('pestañas/treatmentResult', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Diagnóstico online',
            CONTENT => Yii::$app->view->render('pestañas/treatmentReportOnline', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Observaciones comerciales',
            CONTENT => Yii::$app->view->render('pestañas/treatmentCommercialReport', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Informe médico',
            CONTENT => Yii::$app->view->render('pestañas/treatmentMedicalReport', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Recetas',
            CONTENT => Yii::$app->view->render('pestañas/treatmentPrescription', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Incidencias',
            CONTENT => Yii::$app->view->render('pestañas/treatmentIncident', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>