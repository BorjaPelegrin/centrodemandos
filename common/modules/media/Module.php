<?php

namespace common\modules\media;

/**
 * media module definition class
 */
class Module extends \yii\base\Module
{
    public $name = 'Media';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\media\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
