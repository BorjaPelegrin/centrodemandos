<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'todas-las-pestañas-del-empleado',
        RUTA => 'clinicEmployee_tabs',
        'sub' => [
            [
                NOMBRE => 'información',
                RUTA => 'tabInfoClinicEmployee',
            ],
            [
                NOMBRE => 'roles-empleado',
                RUTA => 'tabRolesClinicEmployee',
            ],
            [
                NOMBRE => 'departamentos',
                RUTA => 'tabDepartmentClinicEmployee',
            ],
            [
                NOMBRE => 'puestos',
                RUTA => 'tabEmployeeTypeClinicEmployee',
            ],
            [
                NOMBRE => 'Calendario',
                RUTA => 'tabScheduleClinicEmployee',
            ],
            [
                NOMBRE => 'Horario',
                RUTA => 'tabHoraryClinicEmployee',
            ],
            [
                NOMBRE => 'Área',
                RUTA => 'tabAreaClinicEmployee',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/clinic-employee/view',
    'url' => 'http://backend.minerva.lan/people/clinic-employee/view?id=1',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'clinicEmployeeTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Información',
            CONTENT => Yii::$app->view->render('pestañas/informacion', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Roles',
            CONTENT => Yii::$app->view->render('pestañas/roles', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Departamentos',
            CONTENT => Yii::$app->view->render('pestañas/departamentos', [
                PARENT => $parent,
                RESULT => $result
            ]),
            'active' => false,
        ],
        [
            LABEL => 'Puestos',
            CONTENT => Yii::$app->view->render('pestañas/puestos', [
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
