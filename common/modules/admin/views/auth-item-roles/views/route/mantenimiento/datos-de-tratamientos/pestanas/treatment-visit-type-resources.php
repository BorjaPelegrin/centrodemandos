<?php

$permisos =[
    [
        NOMBRE => 'añadir-recurso-a-utilizar',
        RUTA => '/treatments/treatment-visit-type-resource/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-recurso-a-utilizar',
                RUTA => '/treatments/treatment-visit-type-resource/view',
            ],
            [
                NOMBRE => 'actualizar-recurso-a-utilizar',
                RUTA => '/treatments/treatment-visit-type-resource/update',
            ],
            [
                NOMBRE => 'borrar-recurso-a-utilizar',
                RUTA => '/treatments/treatment-visit-type-resource/delete',
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
