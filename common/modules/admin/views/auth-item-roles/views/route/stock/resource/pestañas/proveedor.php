<?php

$permisos =[
    [
        NOMBRE => 'asignar-actualizar-artículo-a-proveedor',
        RUTA => '/resources/resource-provider/form-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-proveedor-del-artículo',
                RUTA => '/stock/provider/view',
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
