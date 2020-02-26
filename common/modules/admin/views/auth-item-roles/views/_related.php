<?php
$permissions = Yii::$app->authManager->getPermissionsByRole($model->name);
$p = '';
foreach ($permissions as $permission) {
    //var_dump($permission);
    $p .= $permission->name.'<br>';
}
echo $p ?: 'No tiene permisos asignados';
?>

<?php
/*use yii\bootstrap\Tabs;

$modules = Yii::$app->getModules();
$items = [];
foreach ($modules as $id => $module) {
    $module = Yii::$app->getModule($id);
    if (isset($module->name)) {
        $items [] = [
            'label' => $module->name,
            'content' => Yii::$app->view->render('_module', [
                'model' => $model,
                'module' => $id,
                'cont' => $cont
            ]),
            'active' => false,
        ];
    }
}
die();

$authManager = Yii::$app->getAuthManager();
$permissions = array_filter($authManager->getPermissions(), function($item) {
    return strncmp($item->name, '/', 1) !== 0;
});

$items [] = [
    'label' => 'Permisos',
    'content' => Yii::$app->view->render('_permission', [
        'permissions' => $permissions,
        'model' => $model,
    ]),
    'active' => false,
];
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'items' => $items
]) ?>
