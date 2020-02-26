<?php

$permisos =[
    [
        NOMBRE => 'listado-de-comunicaciones',
        RUTA => '/communication/communication/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-recordatorio',
                RUTA => '/communication/notification/form-ajax-reminder',
            ],
            [
                NOMBRE => 'anotar-llamada',
                RUTA => '/communication/communication/form-widget',
            ],
            [
                NOMBRE => 'enviar-email',
                RUTA => '/communication/communication/form-widget',
            ],
            [
                NOMBRE => 'sms',
                RUTA => '/communication/communication/form-widget',
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
