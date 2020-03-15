<?php
namespace themes\custom\widgets;

use Yii;

/**
 * Box with grid
 *
 *  Example:
    <?= \themes\custom\widgets\AdminlteBoxGrid::widget([
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
class AdminlteBoxGrid extends \yii\bootstrap\Widget
{
    public $type;
    public $options;
    public $dataProvider, $searchModel;
    public $columns;
    public $buttons;
    public $contentBefore;
    public $contentAfter;
    public $pagination;

    public function init()
    {
        parent::init();

        if ($this->type == 'list-view') {
            $content =  AdminlteList::widget([
                'dataProvider' => $this->dataProvider,
                'options' => $this->options,
            ]);
        } else {
            $content = AdminlteGrid::widget([
                'searchModel' => $this->searchModel,
                'dataProvider' => $this->dataProvider,
                'options' => $this->options,
                'columns' => $this->columns,
                'pagination' => $this->pagination,
            ]);
        }

        echo AdminlteBox::widget([
            'buttons' => $this->buttons,
            'content' => $this->contentBefore.$content.$this->contentAfter,
            'options' => [
                'class' => isset($this->options['class']) ? $this->options['class'] : 'box-primary',
                'class-header' => 'with-border',
                'box-title' => isset($this->options['box-title']) ? $this->options['box-title'] : 'Listado',
                'box-footer' => isset($this->options['box-footer']) ? $this->options['box-footer'] : '',
            ]
        ]);
    }
}
