<?php
namespace themes\custom\widgets;

use Yii;

/**
 * CallOut
 *
 *
 */
class AdminlteCallOut extends \yii\bootstrap\Widget
{
    public $title;
    public $content;
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('call_out', [
            'title' => $this->title,
            'content' => $this->content,
            'options' => $this->options
        ]);
    }
}
