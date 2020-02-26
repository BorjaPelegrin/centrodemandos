<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/ranking/index',
    'url' => 'http://backend.minerva.lan/bi/ranking/index',
]);
?>

<strong>No hay botones en este momento</strong>