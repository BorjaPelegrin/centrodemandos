<?php

$permisos =[
    [
        NOMBRE => 'cambio-de-horario',
        RUTA => '/clinic/clinic/change-horary',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
