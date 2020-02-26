<?php yii\bootstrap\Modal::begin([
    'id' => 'modal-generic',
    'options' => [
        'tabindex' => false
    ],
    'header' => '<div id="contentHeader"></div>',
    'headerOptions' => [
        'id' => 'modalHeader'
    ],
    'footer' => '',
    'footerOptions' => [
        'id' => 'modalFooter',
        'style' => 'display: none'
    ],
    //'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'toggleButton' => false,
    'clientOptions' => [
        'backdrop' => 'static',
        'keyboard' => false,
    ]
]); ?>

<?= '<div id="modalContent"></div>'; ?>

<?php yii\bootstrap\Modal::end(); ?>
