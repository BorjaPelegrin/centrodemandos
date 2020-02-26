<?php

namespace common\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mdm\admin\models\Assignment;

use common\modules\admin\models\Users;
use common\modules\admin\models\AuthAssignment;
use common\modules\admin\searchs\AuthAssignmentSearch;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionView($item_name, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     */
    public function actionDelete($item_name, $user_id)
    {
        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
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
    public function actionAssign($id,$idClinicEmployee=null)
    {
        $items [] = Yii::$app->getRequest()->post('items', []);
        $model = new Assignment($id);
        $success = $model->assign($items);
        if ($success) {
            $searchModel = new \common\modules\admin\searchs\AuthAssignmentSearch();
            $searchModel->user_id = $id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->renderAjax('@common/modules/admin/views/auth-assignment/views/_grid_generic', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            /*if (!is_null($idClinicEmployee))
                return $this->redirect(['/people/clinic-employee/view', 'id' => $idClinicEmployee]);
            return $this->redirect(['users/view', 'id' => $id]);*/
        }
    }

    /**
     * Assign items
     * @param string $id
     * @return array
     */
    public function actionRevoke($id,$idClinicEmployee=null)
    {
        $items [] = Yii::$app->getRequest()->get('items', []);
        $user = Users::find()->where(['id'=>$id])->one();

        $model = new Assignment($id,$user);
        $success = $model->revoke($items);
        if ($success) {
            if (!is_null($idClinicEmployee))
                return $this->redirect(['/people/clinic-employee/view', 'id' => $idClinicEmployee]);
            return $this->redirect(['users/view', 'id' => $id]);
        }
    }
}
