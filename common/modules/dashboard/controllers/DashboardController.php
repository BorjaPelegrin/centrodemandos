<?php

namespace common\modules\dashboard\controllers;

use yii\web\Controller;

/**
 * Default controller for the `dashboard` module
 */
class DashboardController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        var_dump("asdf");
        die();
        return $this->render('index');
    }

}
