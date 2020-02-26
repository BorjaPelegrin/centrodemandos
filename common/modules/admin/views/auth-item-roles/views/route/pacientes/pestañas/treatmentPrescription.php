<?php

$permisos =[
    [
        NOMBRE => 'listado-recetas-médicas',
        RUTA => '/historical/patient-treatment-prescription/view',
        'sub' => [
            [
                NOMBRE => 'añadir-receta',
                RUTA => '/historical/patient-treatment-prescription/form-ajax',
            ],
            [
                NOMBRE => 'actualizar-receta',
                RUTA => '/historical/patient-treatment-prescription/form-ajax',
            ],
            [
                NOMBRE => 'imprimir-receta',
                RUTA => '/historical/patient-treatment-prescription/print-prescription',
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
