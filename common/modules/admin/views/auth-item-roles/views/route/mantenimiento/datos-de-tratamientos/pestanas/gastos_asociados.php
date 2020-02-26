<?php

$permisos =[
    [
        NOMBRE => 'añadir-gasto-asociado',
        RUTA => '/treatments/treatment-associated-expenses/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-gasto-asociado',
                RUTA => '/treatments/treatment-associated-expenses/view',
            ],
            [
                NOMBRE => 'actualizar-gasto-asociado',
                RUTA => '/treatments/treatment-associated-expenses/update',
            ],
            [
                NOMBRE => 'borrar-gasto-asociado',
                RUTA => '/treatments/treatment-associated-expenses/delete',
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
