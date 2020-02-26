<?php

$permisos =[
    [
        NOMBRE => 'listado-de-presupuestos',
        RUTA => '/documents/budget-document/view',
        'sub' => [
            [
                NOMBRE => 'nuevo-presupuesto',
                RUTA => '/documents/budget-document/form-ajax',
            ],
            [
                NOMBRE => 'ver-el-presupuesto',
                RUTA => '/documents/budget-document/view-ajax',
            ],
            [
                NOMBRE => 'actualizar-presupuesto',
                RUTA => '/documents/budget-document/update',
            ],
            [
                NOMBRE => 'imprimir-presupuesto',
                RUTA => '/documents/budget-document/print',
            ],
            /*[
                NOMBRE => 'abrir-presupuesto',
                RUTA => '/documents/budget-document/open',
            ],*/
            [
                NOMBRE => 'activar-tratamiendo',
                RUTA => '/historical/patient-treatment/archived',
            ],
            [
                NOMBRE => 'activar-presupuesto',
                RUTA => '/documents/budget-document/select',
            ],
            [
                NOMBRE => 'desactivar-presupuesto',
                RUTA => '/documents/budget-document/un-select',
            ],
            [
                NOMBRE => 'subir-contrato',
                RUTA => '/media/media/view-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'calcular-tasas',
        RUTA => '/financials/taxes/calc-taxes',
        'comentario' => ' - Si puede crear o actualizar un presupuesto, este apartado también tiene que estar incluido',
        'sub' => [
            [
                NOMBRE => 'calcular-precio',
                RUTA => '/historical/patient-treatment/calc-price',
            ],
            [
                NOMBRE => 'calcular-precio-en-el-cambio-de-tratamiento',
                RUTA => '/historical/patient-treatment/calc-price-treatment',
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
