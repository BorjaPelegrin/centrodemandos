<?php
namespace common\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','register', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        var_dump("asdf2");die();
        return $this->redirect('/dashboard/index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        var_dump("asdf2");die();
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->setLoginAttempts(0);

            //$session = Yii::$app->admin->initAfterLogin();

            return $this->goBack();
        } else {
            $this->setLoginAttempts($this->getLoginAttempts() + 1);

            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Register action.
     *
     * @return string
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($this->getLoginAttempts() >= 3) {
            $model->scenario = 'withVerifyCode';
        }

        if ($model->load(Yii::$app->request->post())) {
            $user = new User();
            $user->username = $model->username;
            $user->password = $model->password;
            if($user->save()){
                return $this->goBack();
            }
        }
        $model->password = '';

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    protected function getLoginAttempts()
    {
        return Yii::$app->getSession()->get('__LoginAttemptsCount', 0);
    }

    protected function setLoginAttempts($value)
    {
        Yii::$app->getSession()->set('__LoginAttemptsCount', $value);
    }
}
