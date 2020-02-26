<?php

$permisos =[
    [
        NOMBRE => 'añadir-contenido-anuncio-marketing',
        RUTA => '/marketing/marketing-ad-content/create',
        'sub' => [
            [
                NOMBRE => 'ver-contenido-anuncio-marketing',
                RUTA => '/marketing/marketing-ad-content/view',
            ],
            [
                NOMBRE => 'actualizar-contenido-anuncio-marketing',
                RUTA => '/marketing/marketing-ad-content/update',
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
