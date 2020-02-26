<?php

/* @var $parent */


$permisos =[
    [
        NOMBRE => 'crear-nuevo-grupo-tratamiento',
        RUTA => '/treatments/treatment-group/create',
        'sub' => [
            [
                NOMBRE => 'ver-grupo-tratamiento',
                RUTA => '/treatments/treatment-group/view',
            ],
            [
                NOMBRE => 'actualizar-grupo-tratamiento',
                RUTA => '/treatments/treatment-group/update',
            ],
            [
                NOMBRE => 'activar-desactivar-grupo-tratamiento',
                RUTA => '/treatments/treatment-group/change-to-archived',
            ],
            [
                NOMBRE => 'borrar-tratamiento-del-grupo',
                RUTA => '/treatments/treatment-group/delete-treatment-group',
            ],
            [
                NOMBRE => 'ver-tratamientos-del-grupo',
                RUTA => '/treatments/treatment-group/create-treatment-group',
            ],
            [
                NOMBRE => 'añadir-quitar-tratamientos-al-grupo',
                RUTA => '/treatments/treatment-group/change-status',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'treatments/treatment/index',
    'url' => 'http://backend.minerva.lan/treatments/treatment/index',
]);

?>
