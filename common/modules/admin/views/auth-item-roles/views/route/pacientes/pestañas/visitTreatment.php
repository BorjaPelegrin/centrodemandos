<?php

$permisos =[
    [
        NOMBRE => 'ver-tratamiento-de-la-cita',
        RUTA => '/historical/patient-treatment/view',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
