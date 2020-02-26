<?php

$permisos =[
    [
        NOMBRE => 'botón-imprimir-informe',
        RUTA => '/historical/patient-treatment/print-medical-report',
    ],
    [
        NOMBRE => 'botón-añadir-evolutivo',
        RUTA => '/historical/patient-treatment-ce/form-ajax',
    ]
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
