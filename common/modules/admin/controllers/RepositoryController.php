<?php

namespace common\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use alexantr\elfinder\CKEditorAction;
use alexantr\elfinder\ConnectorAction;
use alexantr\elfinder\InputFileAction;
use alexantr\elfinder\TinyMCEAction;

class RepositoryController extends Controller
{
    public $layout = '//main_mini';

    /**
     * @return array
     */
    public function actions()
    {
        $roots = [
            [
                'driver' => 'LocalFileSystem',
                'path' => Yii::getAlias('@media') . DIRECTORY_SEPARATOR . 'repository',
                'mimeDetect' => 'internal',
                'imgLib' => 'gd',
                'accessControl' => function ($attr, $path) {
                    // hide files/folders which begins with dot
                    return (strpos(basename($path), '.') === 0) ?
                        !($attr == 'read' || $attr == 'write') :
                        null;
                },
            ],
        ];

        /*if (Yii::$app->admin->checkPermission('/admin/users/view')) {
            $roots[] = [
                'driver' => 'LocalFileSystem',
                'path' => Yii::getAlias('@media') . DIRECTORY_SEPARATOR . 'pdf',
                //'URL' => Yii::getAlias('@web') . DIRECTORY_SEPARATOR . 'repository',
                'mimeDetect' => 'internal',
                'imgLib' => 'gd',
                'accessControl' => function ($attr, $path) {
                    // hide files/folders which begins with dot
                    return (strpos(basename($path), '.') === 0) ?
                        !($attr == 'read' || $attr == 'write') :
                        null;
                },
            ];
        }*/

        return [
            'connector' => [
                'class' => ConnectorAction::className(),
                'options' => [
                    'roots' => $roots,
                ],
            ],
            'input' => [
                'class' => InputFileAction::className(),
                'connectorRoute' => 'connector',
            ],
            'ckeditor' => [
                'class' => CKEditorAction::className(),
                'connectorRoute' => 'connector',
            ],
            'tinymce' => [
                'class' => TinyMCEAction::className(),
                'connectorRoute' => 'connector',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = '//main_c';

        return $this->render('index');
    }
}
