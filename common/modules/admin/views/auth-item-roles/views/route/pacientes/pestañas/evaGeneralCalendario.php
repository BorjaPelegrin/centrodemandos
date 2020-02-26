<?php

$permisos =[
    [
        NOMBRE => 'listado-del-calendario-de-ciclos',
        RUTA => '/treatments/calendar-entry/view',
        'sub' => [
            [
                NOMBRE => 'ver-medicación-previa',
                RUTA => '/treatments/medication/view',
            ],
            [
                NOMBRE => 'botón-añadir-al-calendario',
                RUTA => '/treatments/calendar-entry/form-ajax',
            ],
            [
                NOMBRE => 'actualizar-fecha',
                RUTA => '/treatments/calendar-entry/update-date',
            ],
            [
                NOMBRE => 'actualizar-número',
                RUTA => '/treatments/medication-chemistry/update-number',
            ],
        ],
    ],
    [
        NOMBRE => 'nueva-medicación-calendario',
        RUTA => '/treatments/medication-chemistry/create',
        'sub' => [
            [
                NOMBRE => 'añadir-medicación-calendario',
                RUTA => '/treatments/medication-chemistry/form-ajax',
            ],
            [
                NOMBRE => 'ver-unidades-de-medida-calendario',
                RUTA => '/treatments/chemistry/unit',
            ],
            [
                NOMBRE => 'borrar-medicación-calendario',
                RUTA => '/treatments/medication-chemistry/delete',
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
