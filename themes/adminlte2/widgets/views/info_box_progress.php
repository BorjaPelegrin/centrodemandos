<?php
use common\classes\Html;
?>

<div class="info-box <?= $options['bg-class'] ?>">
    <span class="info-box-icon">
        <?php if (isset($options['icon-class'])) : ?>
        <i class="<?= $options['icon-class'] ?>"></i>
        <?php endif ?>
        <?= isset($options['img-url']) ? Html::img($options['img-url'], ['style'=>'max-height:100%']) : $options['box-icon-text']?>
    </span>

    <div class="info-box-content">
        <span class="info-box-text"><?= $options['text'] ?></span>
        <span class="info-box-number"><?= $options['number'] ?></span>

        <div class="progress">
            <div class="progress-bar" style="width:<?= $options['progress'] ?>"></div>
        </div>
        <span class="progress-description">
            <?= $options['description'] ?>
        </span>
    </div>
    <!-- /.info-box-content -->
</div>