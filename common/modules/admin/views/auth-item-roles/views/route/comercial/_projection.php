<?php

$permisos =[
    [
        NOMBRE => 'escribir-datos-proyección',
        RUTA => '/bi/projection/update-input',
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/projection/view',
    'url' => 'http://backend.minerva.lan/bi/projection/view',
]);
?>