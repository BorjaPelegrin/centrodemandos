<div class="box box-<?= $options['box-color'] ?> <?= $options['class'] ?>">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $options['title'] ?></h3>

        <div class="box-tools pull-right">
            <span data-toggle="tooltip" title="3 New Messages" class="badge <?= $options['badge-color'] ?>">3</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Panel"><i class="fa fa-comments"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">

        </div>
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
            <?php /*<ul class="contacts-list">
                <li>
                    <a href="#">
                    <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">
                    <div class="contacts-list-info">
                        <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date pull-right">2/28/2015</small>
                        </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                    </a>
                </li>
            <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list --> */ ?>
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <?php if (isset($options['chat']) && $options['chat']) : ?>
            <form action="#" method="post">
                <div class="input-group">
                    <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-<?= $options['box-color'] ?> btn-flat">Send</button>
                    </span>
                </div>
            </form>
        <?php endif; ?>
    </div>
    <!-- /.box-footer-->
</div>
