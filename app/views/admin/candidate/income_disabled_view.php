<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <style>
        li.select2-selection__choice{
            color: red;
        }
        .select2-container--default .select2-selection--single {
            height: 35px;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
    </style>
    <div class="container-fluid">
        <!-- /.row -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3>Disabled candidates</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/candidate-status/" method="post">
                    <table id="example1" class="table table-bordered table-striped universalTable">
                        <thead>
                        <tr>
                            <th>-</th>
                            <th>Email</th>
                            <th>Form Name</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>

                        <? foreach ($candidates as $candidate): ?>
                            <tr>
                                <td><input type="checkbox" name="data[]" value="<?= $candidate->id1 ?>"></td>
                                <td><? if(!$candidate->mail) echo "not exist"; else echo $candidate->mail; ?></td>
                                <td><?= $candidate->form_name ?></td>
                                <td><?= $candidate->reg_date ?></td>
                                <td><a href="#" class="btn btn-block btn-outline-primary btn-sm" onclick="infoCome(<?= $candidate->id1 ?>)" data-toggle="modal" data-target="#modal-lg">View</a></td>
                            </tr>
                        <? endforeach; ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>-</th>
                            <th>Email</th>
                            <th>Form Name</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <div>
                        <div style="display: flex;width: 500px;float: right;">
                            <div class="col-sm-6">
                                <h4 style="text-align: left;margin-top: 3px;lue">Command:</h4>
                            </div>
                            <div class="col-sm-6" style="display: flex;">
                                <select name="command" id="" class="form-control" style="margin-right: 10px">
                                    <option value="--">--</option>
                                    <option value="active">Active</option>
                                    <option value="delete">Delete</option>
                                </select>
                                <button  type="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr>
                    <div style="border: 1px solid #cccccc;padding: 10px;">
                        <h5>Candidate Full info </h5>
                        <hr/>
                        <form action="/resume-create/" method="post" target="_blank">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>-</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody id="info" class="workPlaceV">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>-</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                                </tfoot>
                            </table>
                            <button type="submit" style="width: 100%" class="btn btn-outline-success">Create resume and download</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="/web/assets/tools/message_list.js" type="text/javascript"></script>
    <!-- /.container-fluid -->
</section>