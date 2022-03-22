<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <div class="container-fluid">
        <br>
            <h3>Send messages</h3>
        <hr>
        <!-- /.row -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">DataTable of message lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped universalTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Copy</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($messages as $message): ?>
                        <tr>
                            <td><?= $message->id ?></td>
                            <td><?= $message->mail ?></td>
                            <td><?= $message->subject ?></td>
                            <td><a class="btn btn-block btn-outline-primary btn-sm" onclick="ajax.viewMessage(<?= $message->id ?>)" data-toggle="modal" data-target="#modal-lg" >View</a></td>
                            <td><a href="/admin/message-copy/<?= $message->id ?>" class="btn btn-block btn-outline-info btn-sm">Copy</a></td>
                            <td><a class="btn btn-block btn-outline-danger btn-sm" onclick="ajax.deleteMessage(<?= $message->id ?>)">Delete</a></td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Copy</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="message">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="/web/assets/tools/message_list.js" type="text/javascript"></script>
    <!-- /.container-fluid -->
</section>