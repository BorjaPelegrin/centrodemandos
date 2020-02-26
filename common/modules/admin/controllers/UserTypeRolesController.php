<?php

namespace common\modules\admin\controllers;

use Yii;
use common\modules\admin\models\UserTypeRoles;
use common\modules\admin\searchs\UserTypeRolesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTypeRolesController implements the CRUD actions for UserTypeRoles model.
 */
class UserTypeRolesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Finds the UserTypeRoles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserTypeRoles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserTypeRoles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Assign items
     * @param string $id
     * @return array
     */
    public function actionAssign($id,$item)
    {
        $userTypeRole = $this->findModel($id);
        $userTypeRole->addRole($item);

        return $this->redirect(['/people/clinic-employee/view', 'id' => $userTypeRole->associated_id]);
    }

    /**
     * Assign items
     * @param string $id
     * @return array
     */
    public function actionRevoke($id,$item)
    {
        $userTypeRole = $this->findModel($id);
        $userTypeRole->deleteRole($item);

        return $this->redirect(['/people/clinic-employee/view', 'id' => $userTypeRole->associated_id]);
    }
}
