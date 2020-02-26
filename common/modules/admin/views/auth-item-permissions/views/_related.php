<?php
$modules = Yii::$app->getModules();
//var_dump($modules);
$cont = 0;
foreach ($modules as $id => $module) {
    $module = Yii::$app->getModule($id);
    if (isset($module->name)) {
        echo '<h3>'.$module->name . '</h3>';
        $route = new \mdm\admin\models\Route();
        $routes = $route->getAppRoutes($id);

        $arRoutes = [];
        foreach ($routes as $route) {
            $ro = explode('/', $route);
            if (!in_array($ro[2],$arRoutes)) {
                array_push($arRoutes, $ro[2]);
                //if (Yii::$app->user->can($route))
                if ($ro[2] != '*' && $ro[3] != '*' && $ro[2] != 'default') {
                    $model = new \common\modules\admin\models\PermissionForm();
                    $model->id_user = $idUser;
                    $route = $ro[0].'/'.$ro[1].'/'.$ro[2];
                    $model->checkPermission($route);
                    echo Yii::$app->view->render('@modules/admin/views/permissions/forms/_select', [
                        'model' => $model,
                        'route' => $ro[2],
                        'id' => $cont
                    ]);
                    $cont++;
                }
            }
            //echo $route.'<br>';
        }
    }
}
?>