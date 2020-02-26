<?php
use common\classes\Html;
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php
            foreach ($items as $id => $link) {
                echo $id == 0 ? '<li class="active">' : '<li>';
                echo Html::a($link['text'], '#tab_'.$id, [
                    'data-toggle' => "tab",
                    'aria-expanded' => 'false'
                ]);
                echo '</li>';
            }
        ?>

        <?php foreach ($buttons as $button) {
            echo '<li class="pull-right">';
            echo $button;
            echo '</li>';
        } ?>
    </ul>
    <div class="tab-content">
        <?php
            foreach ($items as $id => $content) {
                echo $id == 0 ? '<div class="tab-pane active" id="tab_'.$id.'">'
                    : '<div class="tab-pane" id="tab_'.$id.'">'
                ;
                echo $content['content'];
                echo '</div>';
            }
        ?>
    </div>
</div>