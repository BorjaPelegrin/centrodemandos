<ul class="timeline">

    <?php
        $timeLabel = [];
        foreach ($dataProvider->getModels() as $model) {
            $options['icon-class'] = 'fa fa-comments bg-yellow';
            $isTime = false;
            $time = date('Y-m-d', strtotime($model->created_at));
            if (!in_array($time, $timeLabel)) {
                $timeLabel[] = $time;
                $isTime = true;
            }
            echo $this->render('_time_line_item', [
                'model' => $model,
                'options' => $options,
                'isTime' => $isTime
            ]);
        }
    ?>
</ul>