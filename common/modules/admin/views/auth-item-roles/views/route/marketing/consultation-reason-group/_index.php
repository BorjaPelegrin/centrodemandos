<?php

$permisos =[
    [
        NOMBRE => 'crear-agrupación-motivo-consulta',
        RUTA => '/marketing/consultation-reason-group/create',
        'sub' => [
            [
                NOMBRE => 'ver-agrupación-motivo-consulta',
                RUTA => '/marketing/consultation-reason-group/view',
            ],
            [
                NOMBRE => 'actualizar-agrupación-motivo-consulta',
                RUTA => '/marketing/consultation-reason-group/update',
            ],
            [
                NOMBRE => 'activar-desactivar-agrupación-motivo-consulta',
                RUTA => '/marketing/consultation-reason-group/change-to-archived',
            ],
            [
                NOMBRE => 'listado-motivos-de-consulta',
                RUTA => '/marketing/consultation-reason-group/create-consultation-reason-group',
            ],
            [
                NOMBRE => 'borrar-motivos-consulta-agrupacion',
                RUTA => '/marketing/consultation-reason-group/delete-group',
            ],
            [
                NOMBRE => 'agregar-motivos-consulta-agrupacion',
                RUTA => '/marketing/consultation-reason-group/change-status',
            ],
            [
                NOMBRE => 'orden-motivos-consulta-de-la-agrupacion',
                RUTA => '/marketing/consultation-reason-group/save-ajax',
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
