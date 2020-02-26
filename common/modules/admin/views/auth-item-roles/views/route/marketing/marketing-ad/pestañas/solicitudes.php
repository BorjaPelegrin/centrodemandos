<?php

$permisos =[
    /*[
        NOMBRE => 'añadir-anuncio-marketing',
        RUTA => '/marketing/marketing-ad/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-anuncio-marketing',
                RUTA => '/marketing/marketing-ad/view',
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
