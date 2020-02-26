<?php

$permisos =[
    [
        NOMBRE => 'añadir-beta',
        RUTA => '/historical/res-ciclo/form-ajax-beta',
        'sub' => [
            [
                NOMBRE => 'añadir-ciclo',
                RUTA => '/historical/res-ciclo/form-ajax',
            ],
            [
                NOMBRE => 'eliminar-beta',
                RUTA => '/historical/res-ciclo/beta-delete',
            ],
            [
                NOMBRE => 'eliminar-recien-nacidos',
                RUTA => '/historical/res-ciclo/rn-delete',
            ],
            [
                NOMBRE => 'añadir-recien-nacidos',
                RUTA => '/historical/res-ciclo/form-ajax-rn',
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
