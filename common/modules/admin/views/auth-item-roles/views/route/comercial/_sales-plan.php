<?php

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'bi/sales-plan/index',
    'url' => 'http://backend.minerva.lan/bi/sales-plan/index',
]);
?>
<strong>No hay botones en este momento</strong>