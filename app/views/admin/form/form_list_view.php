<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <div class="container-fluid">
        <br>
        <h3><?=$type?> Forms</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Show data table of forms</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped universalTable">
                    <thead>
                    <tr>
                        <th>Form id</th>
                        <th>Form name</th>
                        <th>View</th>
                        <? if($type=="Active"): ?>
                            <th>Edit</th>
                        <? else: ?>
                            <th>Active</th>
                        <? endif; ?>
                        <th>Copy</th>
                        <? if($type=="Active"): ?>
                            <th>Disabled</th>
                        <? else: ?>
                            <th>Delete</th>
                        <? endif; ?>

                    </tr>
                    </thead>
                    <tbody>

                    <? if(!empty($forms)): foreach ($forms as $form): ?>

                        <tr>
                            <td><?= $form->id ?></td>
                            <? if($type=="Active"): ?>
                                <td><a href="/data/<?=$form->url?>"  target="_blank"><?= $form->form_name ?></a></td>
                            <? else: ?>
                                <td><?= $form->form_name ?></td>
                            <? endif; ?>
                            <td><a href="#" class="btn btn-block btn-outline-primary btn-sm" onclick="showForm(<?= $form->id ?>)" data-toggle="modal" data-target="#modal-form" >View</a></td>
                            <? if($type=="Active"): ?>
                                <td><a href="/admin/form/edit/<?= $form->id ?>" class="btn btn-block btn-outline-info btn-sm">Edit</a></td>
                            <? else: ?>
                                <td><a href="#" class="btn btn-block btn-outline-info btn-sm" onclick="disabledForm(<?= $form->id ?>)">Activate</a></td>
                            <? endif; ?>
                                <td><a href="/admin/form/copy/<?= $form->id ?>" class="btn btn-block btn-outline-dark btn-sm">Copy</a></td>
                            <? if($type=="Active"): ?>
                                <td><a href="#" class="btn btn-block btn-outline-danger btn-sm" onclick="disabledForm(<?= $form->id ?>)">Disabled</a></td>
                            <? else: ?>
                                <td><a href="#" class="btn btn-block btn-outline-danger btn-sm" onclick="deleteForm(<?= $form->id ?>)">Delete</a></td>
                            <? endif; ?>
                        </tr>

                    <? endforeach; else: echo "No result for show info!"; endif; ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Form id</th>
                        <th>Form name</th>
                        <th>View</th>
                        <? if($type=="Active"): ?>
                            <th>Edit</th>
                        <? else: ?>
                            <th>Active</th>
                        <? endif; ?>
                        <th>Copy</th>
                        <? if($type=="Active"): ?>
                            <th>Disabled</th>
                        <? else: ?>
                            <th>Delete</th>
                        <? endif; ?>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
    <div class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Show form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="bodyExample">

                    </div>
                    <hr color="blue">

                    <div>
                        <label for="message">Request message</label>
                        <textarea id="message" class="form-control" readonly="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>