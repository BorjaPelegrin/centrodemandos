<?php

$permisos =[
    [
        NOMBRE => 'añadir-centro',
        RUTA => '/treatments/forfait/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-centro',
                RUTA => '/treatments/forfait/view',
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
