<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'página-principal-del-paciente',
        RUTA => '/people/patient/view',
        'sub' => [
            [
                NOMBRE => 'cuadro-busqueda-de-pacientes',
                RUTA => '/people/patient/patient-list',
            ],
            [
                NOMBRE => 'busqueda-avanzada-de-pacientes',
                RUTA => '/people/patient/search',
            ],
            [
                NOMBRE => 'subir-foto-de-perfil-del-paciente',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'botón-actualizar-información-paciente',
                RUTA => '/people/patient/update',
            ],
            [
                NOMBRE => 'ver-paciente',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'pestaña-antecedentes-personales',
                RUTA => 'tabClinicHistory',
            ],
            [
                NOMBRE => 'botón-crear-actualizar-antecedentes-personales',
                RUTA => '/people/clinic-history/form-ajax',
            ],
            [
                NOMBRE => 'pestaña-comentarios-internos',
                RUTA => 'tabPatientComment',
            ],
            [
                NOMBRE => 'boton-añadir-comentarios',
                RUTA => '/historical/patient-comment/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'toda-la-información-del-paciente',
        RUTA => 'informacionPaciente',
        'sub' => [
            [
                NOMBRE => 'campo-DNI-CIF',
                RUTA => 'infoPatientDniCif',
            ],
            [
                NOMBRE => 'campo-Teléfono',
                RUTA => 'infoPatientPhone',
            ],
            [
                NOMBRE => 'campo-Email',
                RUTA => 'infoPatientEmail',
            ],
            [
                NOMBRE => 'campo-Dirección',
                RUTA => 'infoPatientAddress',
            ],
            [
                NOMBRE => 'campo-Idioma',
                RUTA => 'infoPatientLanguage',
            ],
            [
                NOMBRE => 'campo-Género',
                RUTA => 'infoPatientGender',
            ],
            [
                NOMBRE => 'campo-Fecha-nacimiento',
                RUTA => 'infoPatientDateBirth',
            ],
            [
                NOMBRE => 'campo-Estado-Civil',
                RUTA => 'infoPatientMaritalStatus',
            ],
            [
                NOMBRE => 'campo-Número-de-hijos',
                RUTA => 'infoPatientNumChilds',
            ],
            [
                NOMBRE => 'campo-Estado',
                RUTA => 'infoPatientStatus',
            ],
            [
                NOMBRE => 'campo-Información-comercial',
                RUTA => 'infoPatientSubscribed',
            ],
            [
                NOMBRE => 'campo-Información-comercial-whatsapp',
                RUTA => 'infoPatientSubscribedWhatsapp',
            ],
            [
                NOMBRE => 'apartado-Saldo-disponible',
                RUTA => 'boxSaldoDisponible',
            ],
            [
                NOMBRE => 'apartado-Solicitudes',
                RUTA => 'boxSolicitudes',
            ],
            [
                NOMBRE => 'apartado-VIP-card',
                RUTA => 'boxVipCard',
            ],
        ],
    ],
    [
        NOMBRE => 'apartado-VIP-card-info',
        RUTA => 'boxVipCard',
        'sub' => [
            [
                NOMBRE => 'añadir-puntos',
                RUTA => '/people/vip-card/initialize-points',
            ],
            [
                NOMBRE => 'ver-detalles-puntos',
                RUTA => '/people/patient/ajax-view-vip-card-operations',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-las-pestañas',
        RUTA => 'patient_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-Solicitudes',
                RUTA => 'tabLeadsPatients',
            ],
            [
                NOMBRE => 'pestaña-Citas',
                RUTA => 'tabVisitsPatients',
            ],
            [
                NOMBRE => 'pestaña-Tratamientos',
                RUTA => 'tabTreatmentsPatients',
            ],
            [
                NOMBRE => 'pestaña-Observaciones',
                RUTA => 'tabCommentsPatients',
            ],
            [
                NOMBRE => 'pestaña-Formularios',
                RUTA => 'tabDocumentsPatients',
            ],
            [
                NOMBRE => 'pestaña-Archivos',
                RUTA => 'tabMediaPatients',
            ],
            [
                NOMBRE => 'pestaña-Llamadas-Email-Sms',
                RUTA => 'tabCommunicationsPatients',
            ],
            [
                NOMBRE => 'pestaña-Encuesta',
                RUTA => 'tabPollPatients',
            ],
            [
                NOMBRE => 'pestaña-Rentabilidad',
                RUTA => 'tabProfitabilityPatients',
            ],
        ],
    ],
    [
        NOMBRE => 'pestaña-Tratamientos-es-el-mismo-que-arriba',
        RUTA => 'tabTreatmentsPatients',
        'sub' => [
            [
                NOMBRE => 'columna-presupuestado',
                RUTA => 'tabTreatmentsPatients_showBudget',
            ],
            [
                NOMBRE => 'columna-cobros',
                RUTA => 'tabTreatmentsPatients_showCharges',
            ],
            [
                NOMBRE => 'columna-porcentaje',
                RUTA => 'tabTreatmentsPatients_showPercentage',
            ],
        ],
    ],
];
?>

<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/patient/view',
    'url' => 'http://backend.minerva.lan/patient/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'patientPermissionTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Solicitudes',
            CONTENT => Yii::$app->view->render('pestañas/lead', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Citas',
            CONTENT => Yii::$app->view->render('pestañas/visit', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Tratamientos',
            CONTENT => Yii::$app->view->render('pestañas/treatment', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Formularios',
            CONTENT => Yii::$app->view->render('pestañas/documents', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Archivos',
            CONTENT => Yii::$app->view->render('pestañas/media', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Llamadas - Email - SMS',
            CONTENT => Yii::$app->view->render('pestañas/comunication', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Encuesta',
            CONTENT => Yii::$app->view->render('pestañas/poll', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Rentabilidad',
            CONTENT => Yii::$app->view->render('pestañas/profitability', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>

