<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <style>
        li.select2-selection__choice{
            color: red;
        }
    </style>
    <div class="container-fluid">
        <br>
        <h3>Settings</h3>
        <hr>
        <!-- /.row -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title" style="">Setting list</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Setting name</th>
                        <th>value</th>
                        <th>-</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Web site name</td>
                        <td>
                            <input value="New Web Site Name" readonly type="text" name="siteName" class="form-control"/>
                        </td>
                        <td><button class="btn btn-outline-info" onclick="ableInput(this)" style="width: 100%">Update</button></td>
                    </tr>

                    <tr>
                        <td>User name</td>
                        <td><input readonly type="text" name="user" value="User name" class="form-control"/></td>
                        <td><button class="btn btn-outline-info" style="width: 100%" onclick="ableInput(this)">Update</button></td>
                    </tr>

                    <tr>
                        <td>Login</td>
                        <td><input readonly type="email" placeholder="example@gmail.com" name="login" class="form-control"/></td>
                        <td><button class="btn btn-outline-info" onclick="ableInput(this)" style="width: 100%">Update</button></td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input readonly type="password" name="password" class="form-control"/></td>
                        <td><button class="btn btn-outline-info" style="width: 100%" data-toggle="modal" data-target="#modal-sm">Confirm</button></td>
                    </tr>
                    <tr>
                        <td>Gmail</td>
                        <td><input readonly type="email" name="gmail" placeholder="example@gmail.com" class="form-control"/></td>
                        <td><button class="btn btn-outline-info" style="width: 100%" onclick="ableInput(this)">Update</button></td>
                    </tr>
                    <tr>
                        <td>Gmail password</td>
                        <td><input readonly type="password" name="gmail_pass" value="password" class="form-control"/></td>
                        <td><button class="btn btn-outline-info" style="width: 100%" data-toggle="modal" data-target="#modal-sm">Confirm</button></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Setting name</th>
                        <th>value</th>
                        <th>-</th>
                    </tr>
                    </tfoot>
                </table>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Password confirm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display: flex;justify-content: space-between;align-items: center">
                    <input type="password" name="old_password" class="form-control"/>
                    <a style="margin-left: 10px;" onclick="changeType()" class="btn btn-outline-info">Show</a>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="setPassword()">Enter</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="/web/assets/tools/settings.js" type="text/javascript"></script>
    <!-- /.container-fluid -->
</section>