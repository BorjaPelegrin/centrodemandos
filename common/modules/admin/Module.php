<?php

namespace common\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $name = 'Admin';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
