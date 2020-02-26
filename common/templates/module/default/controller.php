<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `<?= $generator->moduleID ?>` module
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
}
