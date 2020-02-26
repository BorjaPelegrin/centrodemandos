<?php
use common\classes\Html;
?>

<div class="<?= $options['class'] ?>">
    <span class="<?= $options['class-icon'] ?>">
        <?php if ($options['img']) : ?>
            <?= Html::img($options['img'], ['style' => 'margin-top: -10px;width: 75px;', 'alt' => '']) ?>
        <?php else: ?>
            <i class="<?= $options['icon-class'] ?>"></i>
        <?php endif ?>
    </span>
    <div class="info-box-content">
        <span class="info-box-text"><?= $options['text'] ?></span>
        <span class="info-box-number"><?= $options['number'] ?></span>
    </div>
</div>