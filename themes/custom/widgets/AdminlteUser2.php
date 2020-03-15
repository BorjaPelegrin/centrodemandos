<?php
namespace themes\custom\widgets;

use Yii;

/**
 * User2
 *
 *
 */
class AdminlteUser2 extends \yii\bootstrap\Widget
{
    public $_model;
    public $buttons;
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('user2', [
            'model' => $this->_model,
            'buttons' => $this->buttons,
            'options' => $this->options,
        ]);
    }
}
