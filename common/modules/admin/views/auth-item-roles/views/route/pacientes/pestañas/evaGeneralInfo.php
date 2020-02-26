<?php

$permisos =[
    [
        NOMBRE => 'Listado-de-la-información-general',
        RUTA => '/treatments/general-information/view',
        'sub' => [
            [
                NOMBRE => 'guardar-información-general',
                RUTA => '/treatments/general-information/form-ajax',
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
