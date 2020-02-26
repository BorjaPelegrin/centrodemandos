<?php

$permisos =[
    [
        NOMBRE => 'guardar-reporte',
        RUTA => '/quality/call-report/save-report',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
