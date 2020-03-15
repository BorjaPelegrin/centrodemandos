<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Box with grid
 *
 *  Example:
    <?= \themes\custom\widgets\AdminlteBoxTimeLine::widget([
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'options' => [
            'class' => 'box-pink',
            'pjax-id' => 'pjax-employees',
            'box-title' => '<i class="fa fa-calendar"></i> Listado de empleados',
            'rowOptions' => function($model){
            }
        ]
    ]) ?>
 *
 */
class AdminlteBoxTimeLine extends \yii\bootstrap\Widget
{
    public $options;
    public $dataProvider, $searchModel;
    public $columns;
    public $buttons;

    public function init()
    {
        parent::init();

        $content =  AdminlteTimeLine::widget([
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->dataProvider,
            'options' => $this->options,
            'columns' => $this->columns,
        ]);

        echo AdminlteBox::widget([
            'buttons' => $this->buttons,
            'content' => $content,
            'options' => [
                'class' => isset($this->options['class']) ? $this->options['class'] : 'box-primary',
                'class-header' => 'with-border',
                'box-title' => isset($this->options['box-title']) ? $this->options['box-title'] : 'Listado',
                'box-footer' => isset($this->options['box-footer']) ? $this->options['box-footer'] : '',
            ]
        ]);
    }
}
