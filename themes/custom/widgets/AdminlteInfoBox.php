<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Info Box
 *
 *
 */
class AdminlteInfoBox extends \yii\bootstrap\Widget
{
    public $content;
    public $options;

    public function init()
    {
        parent::init();

        echo $this->render('info_box', [
            'content' => $this->content,
            'options' => $this->options,
        ]);
    }
}
