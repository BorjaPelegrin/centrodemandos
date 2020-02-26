<?php

$permisos =[
    [
        NOMBRE => 'añadir-comparativa-funnel',
        RUTA => '/bi/efficiency/compare-funnel',
    ],

];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/efficiency/funnel',
    'url' => 'http://backend.minerva.lan/bi/efficiency/funnel',
]);
?>
