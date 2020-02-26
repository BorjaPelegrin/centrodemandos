<?php

use common\classes\Html;
use yii\helpers\Url;
use yii\web\View;

$url = Url::to('/magento/phemium/ajax-status-consultants');
$this->registerJs('
    function consultantsOpen() {
        $.get("'.$url.'")
            .done(function( data ) {
                $(\'.consultants-menu\').html(data);
            })
            .fail(function(data) {
                console.log(data);
            });
        return false;
    }
    
    consultantsOpen();
    setInterval(consultantsOpen, 60000);
   
    $(\'#consultants-a\').mouseover(function(){
        $(\'.consultants-menu\').addClass(\'open\');
    }).mouseleave(function() {
        $(\'.consultants-menu\').removeClass (\'open\');
    });

', View::POS_READY);
?>

<!-- Consultants: -->
<li class="dropdown notifications-menu consultants-menu">

</li>
