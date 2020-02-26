<?php
use common\classes\Html;
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php
            foreach ($items as $link) {
                echo Html::a($link['text'], '#', [
                    'data-togle' => "tab",
                    'aria-expanded' => 'false'
                ]);
            }
        ?>
    </ul>
    <div class="tab-content">
        <?php
            foreach ($items as $content) {
                echo '<div class="tab-pane" id="'.$content['text'].'">';
                echo $content['content'];
                echo '</div>';
            }
        ?>
    </div>
</div>