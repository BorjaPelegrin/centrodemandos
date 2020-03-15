<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Time line
 *
 */
class AdminlteTimeLine extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider, $searchModel;
    public $columns;

    public function init()
    {
        parent::init();

        echo $this->render('time_line', [
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
        ]);
    }
}
