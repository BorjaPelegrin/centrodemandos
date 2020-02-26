<?php

$permisos =[
    [
        NOMBRE => 'añadir-anuncio-marketing',
        RUTA => '/marketing/marketing-ad/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-anuncio-marketing',
                RUTA => '/marketing/marketing-ad/view',
            ],
            [
                NOMBRE => 'actualizar-anuncio-marketing',
                RUTA => '/marketing/marketing-ad/update',
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
