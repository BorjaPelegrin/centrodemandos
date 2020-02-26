<?php

$permisos =[
    [
        NOMBRE => 'botón-imprimir-listado-de-obsevaciones',
        RUTA => '/historical/patient-treatment/print-commercial-report',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
