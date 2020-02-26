<?php

$permisos =[
    [
        NOMBRE => 'apartado-presupuestado',
        RUTA => '/financials/default/income-treatments',
        'sub' => [
            [
                NOMBRE => 'presupuestado-ver-el-tratamiento',
                RUTA => '/historical/patient-treatment/view',
            ],
            [
                NOMBRE => 'presupuestado-enviar-por-email',
                RUTA => '/historical/patient-treatment/send',
            ],
            [
                NOMBRE => 'presupuestado-ver-cobros-del-tratamiento',
                RUTA => '/financials/charge/view',
            ],
            [
                NOMBRE => 'presupuestado-ver-cobro',
                RUTA => '/financials/charge/view-ajax',
            ],
            [
                NOMBRE => 'presupuestado-imprimir-cobro',
                RUTA => '/financials/charge/print',
            ],
            [
                NOMBRE => 'presupuestado-añadir-justificante-transferencia',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'presupuestado-añadir-justificante-financiera',
                RUTA => '/media/media/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'apartado-cobros',
        RUTA => '/financials/default/income-charges',
        'sub' => [
            [
                NOMBRE => 'cobros-ver-cobro',
                RUTA => '/financials/charge/view-ajax',
            ],
            [
                NOMBRE => 'cobros-imprimir-cobro',
                RUTA => '/financials/charge/print',
            ],
            [
                NOMBRE => 'cobros-añadir-justificante-transferencia',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'cobros-añadir-justificante-financiera',
                RUTA => '/media/media/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'apartado-devoluciones',
        RUTA => '/financials/default/refund',
        'sub' => [
            [
                NOMBRE => 'devoluciones-ver-el-pago',
                RUTA => '/financials/payment/view-ajax',
            ],
            [
                NOMBRE => 'devoluciones-imprimir-el-pago',
                RUTA => '/financials/payment/print',
            ],
            [
                NOMBRE => 'devoluciones-subir-archivo-del-pago',
                RUTA => '/media/media/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'apartado-gastos',
        RUTA => '/financials/default/expenses-charges',
        'sub' => [
            [
                NOMBRE => 'gastos-ver-el-pago',
                RUTA => '/financials/payment/view-ajax',
            ],
            [
                NOMBRE => 'gastos-imprimir-el-pago',
                RUTA => '/financials/payment/print',
            ],
            [
                NOMBRE => 'gastos-subir-archivo-del-pago',
                RUTA => '/media/media/form-widget',
            ],
        ],
    ],
    [
        NOMBRE => 'calcular-royalties',
        RUTA => '/financials/default/royalties',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'financials/default/index',
    'url' => 'http://backend.minerva.lan/financials/default/index',
]);
?>
