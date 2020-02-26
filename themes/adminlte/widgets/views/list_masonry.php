<?php

use yii\widgets\ListView;
$this->registerCss('
.item {
    display: inline-block;
    margin: 0 0 1em;
    width: 100%;
}

/* Masonry on large screens */
@media only screen and (min-width: 1024px) {
  .masonry {
    column-count: 4;
  }
}

/* Masonry on medium-sized screens */
@media only screen and (max-width: 1023px) and (min-width: 768px) {
  .masonry {
    column-count: 3;
  }
}

/* Masonry on medium-sized screens */
@media only screen and (max-width: 768px) and (min-width: 600px) {
  .masonry {
    column-count: 2;
  }
}

/* Masonry on small screens */
@media only screen and (max-width: 600px) and (min-width: 540px) {
  .masonry {
    column-count: 1;
  }
}
')
?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    //'summary' => '<div style="">Total {totalCount}.</div>',
    'itemOptions' => ['class'=>'item'],
    'itemView' => $options['path-to-list-view'],
    'layout' => $options['layout'],
    'pager' => [
        'triggerText' => 'Mostrar más datos',
        'triggerTemplate' => '<div class="col-lg-12 col-md-12 mb-12 ias-trigger" style=" cursor: pointer;"><a>{text}</a></div>',
        'spinnerTemplate' => '<div class="col-lg-12 col-md-12 mb-12 ias-spinner" style="">
                <div class="spinner">
                Cargando más datos <img src="{src}"/>
                </div>
            </div>',
        'class' => \kop\y2sp\ScrollPager::className(),
        //'paginationSelector' => '.listview .selector',
        //'spinnerSrc' => '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
        'triggerOffset' => 5,
        'noneLeftText' => '<div class="">No hay más registros.</div>'
    ],
]); ?>