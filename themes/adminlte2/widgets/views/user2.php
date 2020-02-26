<?php

use common\classes\Html;
?>

<div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header <?= $options['bgColor']?>-active" style="padding-bottom: 10px; padding-top: 5px">
        <?php
            if($options['img']){
                ?>
                <div class="widget-user-image">
                    <?= Html::img('@web/'.'img/profile.png', ['class' => 'img-circle img-profile-image', 'alt' => '']) ?>
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username" style="font-weight: 600"><?= $options['name'] ?></h3>
                <h5 class="widget-user-desc">
                    <div class="row">
                        <?php
                        $count = $options['buttons'];
                        foreach ($options['buttons'] as $button) {
                            echo "<div class='col-md-5'>" . $button . "</div>";
                        }
                        ?>
                    </div>
                </h5>
                <?php
            } else {
                ?>
                <h3 class="widget-user-username" style="margin-left: 0;font-weight: 600"><?= $options['name'] ?></h3>
                <h5 class="widget-user-desc"  style="margin: 0">
                    <div class="row">
                        <?php
                        $count = $options['buttons'];
                        foreach ($options['buttons'] as $button) {
                            echo "<div class='col-md-6'>" . $button . "</div>";
                        }
                        ?>
                    </div>
                </h5>
                <?php
            }
        ?>
    </div>
    <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
            <?php
                foreach ($buttons as $key => $button) {
                    echo '<li class="' . $key . '">';
                    echo $button;
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
</div>
