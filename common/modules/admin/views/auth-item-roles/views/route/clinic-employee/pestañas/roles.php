<?php

$permisos =[
    [
        NOMBRE => 'asignar-roles',
        RUTA => '/admin/user-type-roles/assign',
        'sub' => [
            [
                NOMBRE => 'ver-información-del-rol',
                RUTA => '/admin/rbac/role/view',
            ],
            [
                NOMBRE => 'quitar-rol-del-empleado',
                RUTA => '/admin/user-type-roles/revoke',
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
