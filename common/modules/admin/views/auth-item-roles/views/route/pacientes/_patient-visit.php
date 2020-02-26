<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'botón-añadir-tratamiento',
        RUTA => '/historical/patient-treatment/form-ajax',
        'comentario' => ' - Si está activo el botón de añadir tratamiento, también hay que añadir los que están dentro ya que si no, dará error y no funcionará.',
        'sub' => [
            [
                NOMBRE => 'desplegable-especialidad',
                RUTA => '/treatments/treatment-type/drop-down-specialty',
            ],
            [
                NOMBRE => 'desplegable-sub-especialidad',
                RUTA => '/treatments/treatment-type/drop-down-subspecialty',
            ],
            [
                NOMBRE => 'desplegable-tratamientos',
                RUTA => '/treatments/treatment-type/drop-down-treatment',
            ],
            [
                NOMBRE => 'pestaña-descripción',
                RUTA => '/treatments/clinic-treatment/treatment-description',
            ],
            [
                NOMBRE => 'pestaña-sesiones',
                RUTA => '/treatments/clinic-treatment/treatment-sesions',
            ],
            [
                NOMBRE => 'comentarios-imagen-manager',
                RUTA => '/redactor/upload/image-json',
            ],
            [
                NOMBRE => 'comentarios-subir-imagen',
                RUTA => '/redactor/upload/image',
            ],
            [
                NOMBRE => 'comentarios-subir-fichero',
                RUTA => '/redactor/upload/file',
            ],
        ],
    ],
    [
        NOMBRE => 'botón-re-citar',
        RUTA => '/calendar/event/reschedule',
    ],
    [
        NOMBRE => 'botón-cambiar-empleado',
        RUTA => '/calendar/event/change-clinic-employee',
    ],
    [
        NOMBRE => 'todas-las-pestañas-de-la-visita',
        RUTA => 'visit_tabs',
        'sub' => [
            [
                NOMBRE => 'pestaña-tratamientos',
                RUTA => 'tabTreatmentsVisits',
            ],
            [
                NOMBRE => 'pestaña-observaciones',
                RUTA => 'tabCommentVisit',
            ],
            [
                NOMBRE => 'pestaña-formularios',
                RUTA => 'tabDocumentsVisit',
            ],
            [
                NOMBRE => 'pestaña-recursos',
                RUTA => 'tabRecursoVisitaVisit',
            ],
            [
                NOMBRE => 'pestaña-archivos',
                RUTA => 'tabMediaVisit',
            ],
            [
                NOMBRE => 'pestaña-valoración-médica',
                RUTA => 'tabMedicalEvaluationVisit',
            ],
        ],
    ],
];

?>

<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'historical/patient-visit/view',
    'url' => 'http://backend.minerva.lan/patient/visit/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'patientVisitTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Tratamientos',
            CONTENT => Yii::$app->view->render('pestañas/visitTreatment', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Observaciones',
            CONTENT => Yii::$app->view->render('pestañas/visitInfo', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Formularios',
            CONTENT => Yii::$app->view->render('pestañas/visitDocuments', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Recursos',
            CONTENT => Yii::$app->view->render('pestañas/visitResources', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Archivos',
            CONTENT => Yii::$app->view->render('pestañas/visitMedia', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Valoración Médica',
            CONTENT => Yii::$app->view->render('pestañas/visitMedicalEvaluation', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>