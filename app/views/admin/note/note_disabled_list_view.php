<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <div class="container-fluid">
        <br>
        <h3>Disabled note lists</h3>
        <hr>
        <!-- /.row -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped universalTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Subject</th>
                        <th>View</th>
                        <th>Able</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($notes as $note): ?>
                        <tr>
                            <td><?= $note->id ?></td>
                            <td><?= $note->subject ?></td>
                            <td><a onclick="infoCome(<?= $note->id ?>)" class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-lg">View</a></td>
                            <td><a onclick="ajax.Done(<?= $note->id ?>)" class="btn btn-block btn-outline-success btn-sm">Able</a></td>
                            <td><a href="/admin/note-edit/<?= $note->id ?>" class="btn btn-block btn-outline-info btn-sm">Edit</a></td>
                            <td><a onclick="ajax.Delete(<?= $note->id ?>)" class="btn btn-block btn-outline-danger btn-sm">Delete</a></td>
                        </tr>
                    <? endforeach; ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Subject</th>
                        <th>View</th>
                        <th>Able</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Note </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="info">


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="/web/assets/tools/note.js" type="text/javascript"></script>
    <!-- /.container-fluid -->
</section>