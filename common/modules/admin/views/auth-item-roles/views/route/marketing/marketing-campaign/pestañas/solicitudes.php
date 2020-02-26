<?php

$permisos =[
    /*[
        NOMBRE => 'página-principal-del-listado-de-citas',
        RUTA => '/calendar/event/index',
        'sub' => [
            [
                NOMBRE => 'botón-imprimir-listado-de-citas',
                RUTA => '/calendar/event/print-all',
            ],
        ],
    ],*/
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>
