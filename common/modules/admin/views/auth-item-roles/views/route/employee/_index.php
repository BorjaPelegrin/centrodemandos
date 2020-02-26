<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'ver-empleado',
        RUTA => '/people/employee/view',
        'sub' => [
            [
                NOMBRE => 'ir-al-usuario',
                RUTA => '/admin/users/view',
            ],
            [
                NOMBRE => 'salir-de-la-aplicación',
                RUTA => '/site/logout',
            ],
            [
                NOMBRE => 'entrar-de-la-aplicación',
                RUTA => '/site/login',
            ],
            [
                NOMBRE => 'subir-foto',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'actualizar-empleado',
                RUTA => '/people/employee/update',
            ],
            [
                NOMBRE => 'ver-listado-de-empleados',
                RUTA => 'employee-all-index',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-las-pestañas-del-empleado',
        RUTA => 'employee_tabs',
        'sub' => [
            [
                NOMBRE => 'contacto',
                RUTA => 'tabContactsEmployee',
            ],
            [
                NOMBRE => 'bloqueo-de-horario',
                RUTA => 'tabScheduleEmployee',
            ],
            [
                NOMBRE => 'clínicas',
                RUTA => 'tabClinicsEmployee',
            ],
            [
                NOMBRE => 'ficheros',
                RUTA => 'tabMediaEmployee',
            ],
            [
                NOMBRE => 'horario',
                RUTA => 'tabHoraryEmployee',
            ],
            [
                NOMBRE => 'Área',
                RUTA => 'tabAreaEmployee',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/employee/view',
    'url' => 'http://backend.minerva.lan/employee/1/view',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'employeeTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Contacto',
            CONTENT => Yii::$app->view->render('pestañas/contacto', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Bloqueo de horarios',
            CONTENT => Yii::$app->view->render('pestañas/schedule', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Clinicas',
            CONTENT => Yii::$app->view->render('pestañas/clinicas', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Ficheros',
            CONTENT => Yii::$app->view->render('pestañas/ficheros', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Horario',
            CONTENT => Yii::$app->view->render('pestañas/horary', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Área',
            CONTENT => Yii::$app->view->render('pestañas/area', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
    ],
]) ?>
