<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'ver-perfil-clínica',
        RUTA => '/clinic/clinic/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-perfil-de-la-clínica',
                RUTA => '/clinic/clinic/update',
            ],
            [
                NOMBRE => 'añadir-clínica',
                RUTA => '/clinic/clinic/create',
            ],
            [
                NOMBRE => 'exportar-excel-clínica',
                RUTA => '/clinic/clinic/export-to-excel',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-las-pestañas-de-la-clínica',
        RUTA => 'clinic_tabs',
        'sub' => [
            [
                NOMBRE => 'contacto-clínica',
                RUTA => 'tabContactsClinics',
            ],
            [
                NOMBRE => 'sociedad',
                RUTA => 'tabSocietyClinics',
            ],
            /*[
                NOMBRE => 'solicitudes-clínica',
                RUTA => 'tabLeadsClinics',
            ],
            [
                NOMBRE => 'pacientes-clínica',
                RUTA => 'tabPatientsClinics',
            ],
            [
                NOMBRE => 'plan-de-ventas-clínica',
                RUTA => 'tabSalesPlanClinics',
            ],
            [
                NOMBRE => 'parrilla-clínica',
                RUTA => 'tabGridClinics',
            ],
            [
                NOMBRE => 'proyección-clínica',
                RUTA => 'tabShowingClinics',
            ],*/
            [
                NOMBRE => 'empleados',
                RUTA => 'tabEmployeesClinics',
            ],
            [
                NOMBRE => 'Áreas',
                RUTA => 'tabAreasClinics',
            ],
            [
                NOMBRE => 'sociedades-emisoras',
                RUTA => 'tabIssuingCompanyClinics',
            ],
            [
                NOMBRE => 'series',
                RUTA => 'tabSeriesClinics',
            ],
            [
                NOMBRE => 'tratamientos',
                RUTA => 'tabTreatmentsClinics',
            ],
            [
                NOMBRE => 'calendario',
                RUTA => 'tabScheduleClinics',
            ],
            /*[
                NOMBRE => 'horario',
                RUTA => 'tabHoraryClinics',
            ],*/
            [
                NOMBRE => 'destino-emails',
                RUTA => 'tabEmailsClinics',
            ],
            /*[
                NOMBRE => 'rentabilidad',
                RUTA => 'tabProfitabilityClinics',
            ],*/
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'clinic/clinic/index',
    'url' => 'http://backend.minerva.lan/clinic/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'clinicsTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Contactos',
            CONTENT => Yii::$app->view->render('pestañas/contacto', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        /*[
            LABEL => 'Solicitudes',
            CONTENT => Yii::$app->view->render('pestañas/leads', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Pacientes',
            CONTENT => Yii::$app->view->render('pestañas/patients', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Parrilla',
            CONTENT => Yii::$app->view->render('pestañas/grid', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Proyección',
            CONTENT => Yii::$app->view->render('pestañas/projection', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],*/
        [
            LABEL => 'Empleados',
            CONTENT => Yii::$app->view->render('pestañas/employee', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Áreas',
            CONTENT => Yii::$app->view->render('pestañas/areas', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Series',
            CONTENT => Yii::$app->view->render('pestañas/series', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Tratamientos',
            CONTENT => Yii::$app->view->render('pestañas/tratamientos', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Calendario',
            CONTENT => Yii::$app->view->render('pestañas/calendario', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        /*[
            LABEL => 'Horario',
            CONTENT => Yii::$app->view->render('pestañas/horary', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],*/
        [
            LABEL => 'Destiona emails',
            CONTENT => Yii::$app->view->render('pestañas/emails', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        /*[
            LABEL => 'Rentabilidad',
            CONTENT => Yii::$app->view->render('pestañas/_index', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],*/
    ],
]) ?>
