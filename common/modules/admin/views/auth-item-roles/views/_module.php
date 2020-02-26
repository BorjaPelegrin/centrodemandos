<?php
    $route = new \mdm\admin\models\Route();
    $routes = $route->getAppRoutes($module);
    $hr;
    $cont = 0;
    foreach ($routes as $route) {
        /**
         * Hay 4 valores
         *  [0] ''
         *  [1] Módulo (admin)
         *  [2] Sub-módulo (rbac)
         *  [3] Controlador (assignment)
         *  [4] Action (index)
         * En caso de no tener sub-módulo, el 3 y 4 se convierten en 2 y 3 respectivamente
         */
        $ro = explode('/', $route);
        if($cont == 0){
            if (isset($ro[4])) {
                echo "<div class='row'><div class='col-md-12'><h3>$ro[2] - ".Yii::$app->permission->getDescription($ro[3])."</h3>";
            } else {
                echo "<div class='row'><div class='col-md-12'><h3>".Yii::$app->permission->getDescription($ro[2])."</h3>";
            }
        }
        $permission = new \common\modules\admin\models\PermissionForm();
        $permission->id_user = $idUser;
        $permission->id_role = $model->name;
        $permission->route = $route;
        $permission->allow = $permission->checkPermissionRole();
        //var_dump($permission->allow);
        if (isset($ro[4])) {
            if($cont > 0 && $hr != $ro[3]){
                echo "</div></div><div class='row'><div class='col-md-12'><h3>$ro[2] - ".Yii::$app->permission->getDescription($ro[3])."</h3>";
            }
            $hr = $ro[3];
        } else {
            if($cont > 0 && $hr != $ro[2]){
                echo "</div></div><div class='row'><div class='col-md-12'><h3>".Yii::$app->permission->getDescription($ro[2])."</h3>";
            }
            $hr = $ro[2];
        }
        echo Yii::$app->view->render('@modules/admin/views/permissions/forms/_select', [
            'ro' => $ro,
            'model' => $permission,
            'id' => $module.$cont
        ]);
        $cont++;
    }
    echo "</div></div>";
?>