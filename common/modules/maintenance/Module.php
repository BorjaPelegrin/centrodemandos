<?php

namespace common\modules\maintenance;

/**
 * maintenance module definition class
 */
class Module extends \yii\base\Module
{
    public $name = 'Maintenance';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\maintenance\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
