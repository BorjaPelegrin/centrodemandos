<?php
    //Yii::$app->permission->permissionRoles($idUser);

    $permissionsByUser = Yii::$app->permission->permissionModules($idUser);
    if ($permissionsByUser) {
        foreach ($permissionsByUser as $permission) {
            //var_dump($permission);
            echo $permission->name;
            //$per = Yii::$app->permission->getChildren($permission->name);
            //var_dump($per);
            echo '<br>';
        }
    }
?>