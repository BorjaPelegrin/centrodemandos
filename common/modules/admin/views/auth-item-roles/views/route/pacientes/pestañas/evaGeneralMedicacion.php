<?php

$permisos =[
    [
        NOMBRE => 'ver-listado-de-medicaciones',
        RUTA => '/treatments/medication/view',
        'sub' => [
            [
                NOMBRE => 'ver-medicaciones-creadas',
                RUTA => '/treatments/medication-chemistry/view',
            ],
        ],
    ],
    [
        NOMBRE => 'nueva-medicación',
        RUTA => '/treatments/medication-chemistry/create',
        'sub' => [
            [
                NOMBRE => 'añadir-medicación',
                RUTA => '/treatments/medication-chemistry/form-ajax',
            ],
            [
                NOMBRE => 'ver-unidades-de-medida',
                RUTA => '/treatments/chemistry/unit',
            ],
            [
                NOMBRE => 'borrar-medicación',
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
