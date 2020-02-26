<?php

namespace common\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\modules\admin\models\Users;
use common\modules\admin\models\UserEntity;
use common\modules\admin\searchs\UsersSearch;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public $layout = '//main_mini';

    /**
     * @param \yii\base\Action $event
     * @return bool|\yii\web\Response
     */
    public function beforeAction($event)
    {
        if (!Yii::$app->admin->checkPermission('privateAccessController')) {
            return $this->redirect(['/dashboard']);
        }
        return parent::beforeAction($event);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->searchExtraData(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id=null)
    {
        if (Yii::$app->user->id != $id && !Yii::$app->admin->checkPermission('/admin/users/view')) {
            $id = Yii::$app->user->id;
        }

        if (is_null($id))
            $id = Yii::$app->getRequest()->post('id');

        $model = $this->findModel($id);

        $entity = new UserEntity();
        if (!is_null($model->idUserEntity)) {
            $entity = $model->idUserEntity;
        }

        $entity->user_id = $model->id;

        if ($entity->load(Yii::$app->request->post()) && $entity->save()) {
            Yii::$app->session->setFlash('success', 'Actualización correcta.');
            return $this->redirect(['view', 'id'=>$entity->user_id]);
        }

        $model->scenario = 'password';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Password cambiada.');
        }

        return $this->render('view', [
            'model' => $model,
            'entity' => $entity
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->users->sendMailAfterCreateUser($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->users->sendMailAfterUpdateUser($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Chage password an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChangePassword($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('password', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Active an existing Users model.
     * If deactive is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionActive($id)
    {
        $model = $this->findModel($id);
        $model->status = 10;
        if ($model->save())
            return $this->redirect(['view', 'id'=>$model->id]);
    }

    /**
     * Deactive an existing Users model.
     * If deactive is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeactive($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        if ($model->save())
            return $this->redirect(['view', 'id'=>$model->id]);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Generate token an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionToken($id)
    {
        $model = $this->findModel($id);

        if (is_null($model->access_token) || empty($model->access_token) || isset($_POST['new'])) {
            $model->access_token = $model->getUniqueAccessToken();
            $model->save();
        }

        if (isset($_POST['new'])) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('token', [
                'model' => $model,
            ]);
        }
    }

    public function actionFormAjax($id)
    {
        if (is_null($id))
            $id = Yii::$app->getRequest()->post('id');

        $model = $this->findModel($id);

        return $this->renderAjax('view', [
            'model' => $model,
        ]);
    }

    public function actionViewInfo($id)
    {
        $model = $this->findModel($id);

        return $this->renderAjax('view_info', [
            'model' => $model,
        ]);
    }
}
