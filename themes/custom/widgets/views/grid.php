<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

$dataPager = isset($pager) ? $pager : [
    'prevPageLabel' => '<i class="fa fa-chevron-left"></i>',   // Set the label for the "previous" page button
    'nextPageLabel' => '<i class="fa fa-chevron-right"></i>',   // Set the label for the "next" page button
    'firstPageLabel'=>'<i class="fa fa-step-backward"></i>',   // Set the label for the "first" page button
    'lastPageLabel'=>'<i class="fa fa-step-forward"></i>',    // Set the label for the "last" page button
    'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
];

$data = [
    'layout' => $options['layout'] ? $options['layout'] : '{summary}<div class="table-responsive">{items}</div>{pager}',
    'dataProvider' => $dataProvider,
    'options' => [
        'class' => ''
    ],
    'tableOptions' => $options['tableOptions'] ? $options['tableOptions'] :  ['class' => 'table table-striped table-bordered'],
    'rowOptions'=>$options['rowOptions'],
    'showFooter' => $options['showFooter'] ? $options['showFooter'] : false,
    'footerRowOptions' =>[
    'class' => $options['classFooter'] ? $options['classFooter'] : 'table-total-footer',
        //'style' => 'background-color: rgb(243, 156, 18); color: white; border-top: 3px solid fuchsia; font-size: 17px',
    ],
    'pager' => $dataPager,
    'columns' => $columns,
];

if ($searchModel) {
    $data ['filterModel'] = $searchModel;
}

/*$this->registerJs(<<<JS
$('#pjax-search').on('pjax:error', function (event) {
    alert('La búsqueda es lenta, se recargará la página');
    console.log(event);
    event.preventDefault();
});
JS
);*/
?>

<?php if(!$options['no-ajax'] === true) : ?>
<?php Pjax::begin([
    'id' => $options['pjax-id'],
]); ?>
<?php endif; ?>

<?= GridView::widget($data); ?>

<?php
    if ($pagination) {
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
    }
?>

<?php if(!$options['no-ajax'] === true) : ?>
<?php Pjax::end(); ?>
<?php endif; ?>
