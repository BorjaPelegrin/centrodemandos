<?php if ($isTime) : ?>
<!-- timeline time label -->
<li class="time-label">
    <span class="<?= $options['class-time-label'] ?>bg-red">
        <?= Yii::$app->formatter->asDate($model->created_at) ?>
    </span>
</li>
<!-- /.timeline-label -->
<?php endif; ?>
<!-- timeline item -->
<li>
    <i class="<?= $options['icon-class'] ?>"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asTime($model->created_at) ?></span>

        <h3 class="timeline-header"><?= $model->employee ?></h3>

        <div class="timeline-body">
            <?= $model->text ?>
        </div>
        <!--<div class="timeline-footer">
            <a class="btn btn-primary btn-xs">Read more</a>
            <a class="btn btn-danger btn-xs">Delete</a>
        </div>-->
    </div>
</li>
<!-- END timeline item -->