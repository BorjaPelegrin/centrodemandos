<div id="<?= $options['id'] ?>" class="box <?= $options['class'] ?>" title="<?= $options['title'] ?>">
    <div class="box-header <?= $options['class-header'] ?>" data-widget="<?= $options['data-widget'] ?>">
        <h3 class="box-title <?= $options['class-title'] ?>"><?= $options['box-title'] ?></h3>
        <?php if (count($buttons)>0) : ?>
            <!-- tools box -->
            <div class="pull-right box-tools btn-group">
                <?php foreach ($buttons as $button) {
                    echo $button;
                } ?>
            </div>
            <!-- /. tools -->
        <?php endif ?>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <?= $content ?>
    </div>
    <!-- /.box-body -->

    <?php if (!empty($options['box-footer'])) : ?>
        <div class="box-footer clearfix">
            <?= $options['box-footer'] ?>
        </div>
    <?php endif ?>
</div>
