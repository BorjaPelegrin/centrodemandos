<?php

use yii\helpers\Url;

$url = Url::to('/magento/default/status-consultants');
$this->registerJs('
    function consultantsOpen() {
        $.post("'.$url.'")
            .done(function( data ) {
                $(\'list-consultants\').html(data);
            })
            .fail(function() {
                alert( "error" );
            })
    }
');
?>

<!-- Control Sidebar Toggle Button -->
<li>
    <a href="#" data-toggle="control-sidebar" onclick="consultantsOpen" ><i class="fa fa-user-md"></i></a>
</li>