<?php

namespace common\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * @param $action
     * @return bool|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (!Yii::$app->admin->checkPermission('privateAccessController')) {
            return $this->redirect(['/dashboard']);
        }
        return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetWeeks($year)
    {
        $rows = Yii::$app->admin->getArrayMonthWeeks($year);

        $droptions = "<option></option>";

        if(count($rows)>0){
            foreach($rows as $id => $row){
                $droptions .= '<option value='.$id.'>'.$row.'</option>';
            }
        }
        else{
            $droptions .= "<option>No existen landings</option>";
        }

        echo $droptions;
    }
}
