<?php

$permisos =[
    [
        NOMBRE => 'escribir-datos-hoja-de-datos',
        RUTA => '/bi/data-sheet/update-input',
    ],
]
    ?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/data-sheet/view',
    'url' => 'http://backend.minerva.lan/bi/data-sheet/view',
]);
?>