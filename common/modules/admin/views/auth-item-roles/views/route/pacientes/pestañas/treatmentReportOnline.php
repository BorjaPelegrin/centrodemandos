<?php

$permisos =[
    [
        NOMBRE => 'añadir-diagnóstico-online',
        RUTA => '/historical/patient-treatment-report-online/form-ajax',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
