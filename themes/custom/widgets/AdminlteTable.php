<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Table
 *
 */
class AdminlteTable extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider, $searchModel;
    public $columns;

    public function init()
    {
        parent::init();

        echo $this->render('table', [
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'columns' => $this->columns,
            'pager' => $this->options['pager'],
        ]);
    }
}
