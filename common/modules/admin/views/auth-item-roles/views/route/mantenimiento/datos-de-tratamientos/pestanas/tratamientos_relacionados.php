<?php

$permisos =[
    [
        NOMBRE => 'crear-tratamiento-relacionado',
        RUTA => '/treatments/related-treatment/create',
        'sub' => [
            [
                NOMBRE => 'actualizar-tratamiento-relacionado',
                RUTA => '/treatments/related-treatment/update',
            ],
            [
                NOMBRE => 'borrar-tratamiento-relacionado',
                RUTA => '/treatments/related-treatment/delete',
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
