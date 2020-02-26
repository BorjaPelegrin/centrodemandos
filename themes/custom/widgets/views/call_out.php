<div class="callout callout-<?= $options['type'] ?>" style="min-height: 90px;">
    <h4>
        <?php if (isset($options['icon-class'])) : ?>
            <i class="<?= $options['icon-class'] ?>"></i>
        <?php endif ?>
        <?= $title ?>
    </h4>
    <?= $content ?>
</div>
