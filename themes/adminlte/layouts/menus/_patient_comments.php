<?php
use yii\helpers\Html;
use common\modules\historical\models\PatientComment;

$comments = PatientComment::find()
    ->where('is_read = 0 and type_id = '.PatientComment::CHATBOT)
    ->all();
$count = count($comments);

$this->registerCss('
.block-with-text {
    max-height: 61px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    white-space: normal;
}
');
?>

<!-- comments: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Comentarios">
        <i class="fa fa-comments"></i>
        <?php if ($count > 0) : ?>
            <span class="label label-danger"><?= $count ?></span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Últimos comentarios: <?= $count ?></li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu" style="">
                <?php foreach ($comments as $comment) : ?>
                    <li>
                        <?= Html::a($comment->comment,
                            ['/historical/patient-comment/view-ajax', 'id'=>$comment->id_patient_comment],
                            [
                                'class' => 'showModal',
                                'data-toggle' => 'tooltip',
                                'title' => $comment->comment,
                                'data-size' => 'modal-lg'
                            ]
                        ) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li class="footer">
            <div class="row">
                <div class="col-md-6" style="padding: 0 30px;">
                </div>
                <div class="col-md-6" style="padding: 0 30px;">
                    <?= Html::a('<i class="fa fa-navicon"></i> Todos', ['/historical/patient-comment/index'], ['class' => '']) ?>
                </div>
            </div>
        </li>
    </ul>
</li>

