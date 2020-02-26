<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

$pager = isset($pager) ? $pager : [
    'prevPageLabel' => '<i class="fa fa-chevron-left"></i>',   // Set the label for the "previous" page button
    'nextPageLabel' => '<i class="fa fa-chevron-right"></i>',   // Set the label for the "next" page button
    'firstPageLabel'=>'<i class="fa fa-step-backward"></i>',   // Set the label for the "first" page button
    'lastPageLabel'=>'<i class="fa fa-step-forward"></i>',    // Set the label for the "last" page button
    'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
];

$config = [
    'dataProvider' => $dataProvider,
    'itemView' => $options['path-to-list-view'],
    'itemOptions' => $options['itemOptions'],
    'layout' => $options['layout'],
    'pager' => $pager,
];

if ($options['viewParams']) {
    $config['viewParams'] = $options['viewParams'];
}
?>

<?php Pjax::begin([
    'id' => $options['pjax-id'],
]); ?>

<?= ListView::widget($config) ?>

<?php Pjax::end(); ?>