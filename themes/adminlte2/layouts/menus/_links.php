<?php
use common\classes\Html;

$links = [
    [
        'text' => 'Preguntas frecuentes',
        'url' => ['/knowledge/faqs/index'],
    ],
    [
        'text' => 'Documentos',
        'url' => ['/knowledge/knowledge-category/documents']
    ],
    [
        'text' => 'Almacén de Archivos',
        'url' => ['/admin/repository/index']
    ],
    [
        'text' => 'Tarifas',
        'url' => ['/treatments/treatment/show-prices'],
        'class' => 'showModal',
        'data-size'=>'modal-lg',
    ],
    [
        'text' => 'Manuales',
        'url' => ['/knowledge/default/help'],
    ],
    [
        'text' => 'Formación Online',
        'url' => ['/knowledge/default/online-training'],
    ],
]
?>

<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Accesos directos">
        <i class="fa fa-star"></i>
        <span class="label label-danger"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Accesos directos</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu" style="max-height: 600px;">
                <?php foreach ($links as $link) : ?>
                    <li>
                        <?= Html::a($link['text'], $link['url'], ['class' => $link['class'], 'data-size' => $link['data-size'], 'title' => $link['text']]) ?>
                    </li>
                <?php endforeach; ?>
                <li>
                    <?= \yii\helpers\Html::a('COMUNICACIÓN SINIESTROS SEGURO RC', 'https://abogadosderechosanitario.lemornebrabant.com/notificacion-incidencia/', [
                         'target' => '_blank'
                    ]) ?>
                </li>
            </ul>
        </li>
    </ul>
</li>