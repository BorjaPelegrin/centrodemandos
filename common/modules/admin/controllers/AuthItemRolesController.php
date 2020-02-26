<?php

namespace common\modules\admin\controllers;

use Yii;
use common\modules\admin\models\AuthItem;
use common\modules\admin\searchs\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemRolesController implements the CRUD actions for AuthItem model.
 */
class AuthItemRolesController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $searchModel->type = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $model->type = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRolesV2($id)
    {
        $sql = "SELECT child FROM yii_auth_item_child WHERE parent = '$id'";
        $result = \Yii::$app->db->createCommand($sql)->queryColumn();
        return $this->render('roles-v2', [
            'parent' => $id,
            'description' => $this->findModel($id)->description,
            'result' => $result,
        ]);
    }

    public function actionListPermissions($id=null,$user_id=null)
    {
        if ($id)
            $permissions = Yii::$app->authManager->getPermissionsByRole($id);
        if ($user_id)
            $permissions = Yii::$app->authManager->getPermissionsByUser($user_id);

        $p = '';
        foreach ($permissions as $permission) {
            $p .= $permission->name.'<br>';
        }

        return $p ? : 'No tiene permisos asignados';
    }

    public function actionViewInfoAjax($id)
    {
        $model = $this->findModel($id);

        return $this->renderAjax('view_info', [
            'model' => $model,
        ]);
    }
}
