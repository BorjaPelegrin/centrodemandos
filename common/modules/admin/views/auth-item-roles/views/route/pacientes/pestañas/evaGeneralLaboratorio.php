<?php

$permisos =[
    [
        NOMBRE => 'ver-formulario-inseminación',
        RUTA => '/documents/form-inseminacion/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-inseminación',
                RUTA => '/documents/form-inseminacion/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-punción-y-fecundación',
        RUTA => '/documents/form-puncion-fecun/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-punción-y-fecundación',
                RUTA => '/documents/form-puncion-fecun/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-transferencia-embrionaria-en-fresco',
        RUTA => '/documents/form-transferencia/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-transferencia-embrionaria-en-fresco',
                RUTA => '/documents/form-transferencia/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-criotransferencia',
        RUTA => '/documents/form-criotransferencia/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-criotransferencia',
                RUTA => '/documents/form-criotransferencia/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-vitrificación-de-embriones',
        RUTA => '/documents/form-vitrif-embriones/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-vitrificación-de-embriones',
                RUTA => '/documents/form-vitrif-embriones/form-ajax',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formulario-vitrificación-de-óvulos',
        RUTA => '/documents/form-vitrif-ovulos/view',
        'sub' => [
            [
                NOMBRE => 'guardar-formulario-vitrificación-de-óvulos',
                RUTA => '/documents/form-vitrif-ovulos/form-ajax',
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
