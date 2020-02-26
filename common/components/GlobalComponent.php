<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\db\Expression;

class GlobalComponent extends Component
{
    public function init()
    {
        parent::init();

        if (!Yii::$app->user->isGuest) {
            /*$this->prepareDbClinic(Yii::$app->user->identity->db_clinic);
            Yii::$app->language = Yii::$app->user->identity->interface_locale;*/

            // Todo: cambia el tempa según el clinicEmployee
            /*Yii::$app->view->theme = new \yii\base\Theme([
                'basePath' => '@app/../themes/adminlte_demo',
                'pathMap' => [
                    '@app/views' => '@app/../themes/adminlte_demo',
                ],
                'baseUrl' => '@web',

            ]);*/
        }
    }


    /**
     * @param $db
     * @return \yii\db\Connection
     * @throws \yii\db\Exception
     */
    public function connetDb($db)
    {
        $connection = new \yii\db\Connection([
            'dsn' => Yii::$app->params['dsn'] . $db['dbName'],
            'username' => $db['dbUser'],
            'password' => $db['dbPassword'],
            'charset' => 'utf8',
            'tablePrefix' => 'yii_',
            // Enable schema cache
            'enableSchemaCache' => YII_DEBUG ? false : true,
            // Duration of schema cache.
            'schemaCacheDuration' => 3600,
            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
        ]);
        $connection->open();

        return $connection;
    }
}