<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Box
 *
 */
class AdminlteBox extends \yii\bootstrap\Widget
{
    public $content;
    public $options;
    public $buttons;

    public function init()
    {
        parent::init();

        echo $this->render('box', [
            'buttons' => $this->buttons,
            'content' => $this->content,
            'options' => $this->options,
        ]);
    }
}
