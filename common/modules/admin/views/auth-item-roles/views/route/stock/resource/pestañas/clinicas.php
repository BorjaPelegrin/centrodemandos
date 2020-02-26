<?php

$permisos =[
    [
        NOMBRE => 'asignar-actualizar-recurso-a-clínica',
        RUTA => '/resources/resource-clinic/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-clínica-asignada',
                RUTA => '/clinic/clinic/view',
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
