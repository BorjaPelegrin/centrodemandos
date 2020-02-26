<?php

$permisos =[
    [
        NOMBRE => 'guardar-actualizar-horario-empleado',
        RUTA => '/people/clinic-employee/add-horary',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
