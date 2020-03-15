<?php
namespace themes\custom\widgets;

use Yii;

/**
 * List
 *
 */
class AdminlteList extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider;

    public function init()
    {
        parent::init();

        echo $this->render('list', [
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'pager' => $this->options['pager'],
        ]);
    }
}
