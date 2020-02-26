<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user-md"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">
            <!-- /.control-sidebar-menu -->
            <?php if (\Yii::$app->params['crm']['active']) : ?>
                <h3 class="control-sidebar-heading">Tareas</h3>
                <ul class="control-sidebar-menu" style="padding: 0 15px;">
                    <?= $this->render('@common/modules/crm/views/tasks/views/_list_generic', [
                        'dataProvider' => \Yii::$app->crm->getTasks()
                    ]) ?>
                </ul>
                <!-- /.control-sidebar-menu -->
            <?php endif ?>
            <?php if (\Yii::$app->params['crm']['active']) : ?>
                <h3 class="control-sidebar-heading">Chat</h3>
                <?php
                    $model = new \common\modules\crm\models\CrmChat();
                    $searchModel = new \common\modules\crm\searchs\CrmChatSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                ?>
                <?= $this->render('@common/modules/crm/views/chat/view_ajax', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
                ]) ?>
            <?php endif ?>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->