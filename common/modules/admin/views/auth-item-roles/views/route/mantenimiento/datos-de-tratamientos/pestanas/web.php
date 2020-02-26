<?php

$permisos =[
    [
        NOMBRE => 'nuevo-contenido-para-web-tratamiento',
        RUTA => '/web/treatment-web-lang/create',
        'sub' => [
            [
                NOMBRE => 'ver-web-tratamiento',
                RUTA => '/web/treatment-web-lang/view',
            ],
            [
                NOMBRE => 'actualizar-web-tratamiento',
                RUTA => '/web/treatment-web-lang/update',
            ],
            [
                NOMBRE => 'borrar-web-tratamiento',
                RUTA => '/web/treatment-web-lang/delete',
            ],
            [
                NOMBRE => 'añadir-link-web-tratamiento',
                RUTA => '/web/links/create',
            ],
            [
                NOMBRE => 'actualizar-link-web-tratamiento',
                RUTA => '/web/links/update',
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
