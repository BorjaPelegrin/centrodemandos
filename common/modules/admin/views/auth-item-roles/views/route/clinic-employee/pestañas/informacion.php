<?php

$permisos =[
    [
        NOMBRE => 'actualizar-empleado-clínica',
        RUTA => '/people/clinic-employee/update',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
