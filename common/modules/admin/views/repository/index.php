<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Repositorio de archivos';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
    iframe {
        border: 0;
        width: 100%;
    }
');

$this->registerJs('
   function tamVentana() {
      var tam;
      if (typeof window.innerWidth != \'undefined\')
      {
        tam = window.innerHeight;
      }
      else if (typeof document.documentElement != \'undefined\'
          && typeof document.documentElement.clientWidth !=
          \'undefined\' && document.documentElement.clientWidth != 0)
      {
        tam = [
            document.documentElement.clientHeight
        ];
      }
      else   {
        tam = [
            document.getElementsByTagName(\'body\')[0].clientHeight
        ];
      }
      height = tam - 106;
      return height+"px";
   } 
   
   function iframeLoaded() {
       var iframe = document.getElementById("iframe");
       var height = tamVentana();
       iframe.style.height = height;
   }
', \yii\web\View::POS_HEAD);
?>

<div class="openkm">
    <iframe id="iframe" onload="iframeLoaded()" src="http://docs.halsystem.es:8080/"></iframe>

    <?php /*= alexantr\elfinder\ElFinder::widget([
        'connectorRoute' => ['repository/connector'],
        'settings' => [
            'height' => 540,
        ],
        'buttonNoConflict' => true,
    ]) */ ?>
</div>
