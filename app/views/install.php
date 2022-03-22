<?php $this->layout('layout/installation',['status'=>true,'url'=>$url]) ?>
<div class="installation">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success" style="background: rgba(255,255,255,0.1)">
                <div class="card-header">
                    <h3 class="card-title">Installation Panel</h3>
                </div>
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist" style="background: rgba(0,0,0,0.3);">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label white-text">Database settings</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label white-text">Admin settings</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#secret-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="secret-part" id="secret-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label white-text">Secret confirm</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label class="white-text">User name</label>
                                    <input type="text" name="user" id="user" required autocomplete="off" class="form-control" value="Jone Doe" placeholder="Enter your name...">
                                </div>
                                <div class="form-group">
                                    <label class="white-text">Host name</label>
                                    <input type="text" name="host" id="host" required autocomplete="off" class="form-control" value="localhost" placeholder="Enter localhost...">
                                </div>
                                <div class="form-group">
                                    <label class="white-text">Database name</label>
                                    <input type="text" name="db_name" id="db_name" required autocomplete="off" class="form-control" placeholder="Enter database name...">
                                </div>
                                <div class="form-group">
                                    <label class="white-text">Database login</label>
                                    <input type="text" name="db_login" id="db_login" required autocomplete="off" class="form-control" placeholder="Enter database login...">
                                </div>
                                <div class="form-group">
                                    <label class="white-text">Database password</label>
                                    <input type="text" name="db_pass" id="db_pass"  required autocomplete="off" class="form-control" placeholder="Enter database password...">
                                </div>
                                <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                            </div>
                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="white-text">Gmail</label>
                                        <input type="email" class="form-control" placeholder="example@gmail.com" name="gmail">
                                    </div>
                                    <div class="form-group">
                                        <label class="white-text">Gmail password</label>
                                        <input type="password" class="form-control" name="gmail_pass" placeholder="Enter gmail password">
                                    </div>
                                    <div class="form-group">
                                        <label class="white-text">Login</label>
                                        <input type="email" onchange="emailRequired(this.id)" required name="login" id="exampleInputEmail1" autocomplete="off" class="form-control" value="" placeholder="example@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="white-text">Admin password</label>
                                        <input type="password" required name="password" autocomplete="off" id="password" class="form-control" value="" placeholder="Enter admin password...">
                                    </div>
                                    <div class="form-group">
                                        <label class="white-text">Admin confirm password</label>
                                        <input type="password" required name="admin_pass_confirm" onchange="comparePassword()" id = 'admin_pass_confirm' autocomplete="off" class="form-control" value="" placeholder="Enter confirm password...">
                                    </div><br/>

                                </div>
                                <a class="btn btn-primary" onclick="comparePassword();stepper.previous();">Previous</a>
                                <a class="btn btn-primary" onclick="stepper.next()">Next</a>
                            </div>
                            <div id="secret-part" class="content" role="tabpanel" aria-labelledby="secret-part-trigger">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="white-text">Confirm secret key</label>
                                        <input type="password" required autocomplete="off" onclick="comparePassword()" onkeyup="comparePasswordId(this.id)" name="confirm_key"  id="confirm_key" class="form-control" value="" placeholder="Enter password...">
                                    </div>
                                </div>
                                <a class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" id="errorMessage">
                    This is for installation
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<script>
    function emailRequired(id){
        var emailCheck = document.getElementById(id).value;
        if(emailCheck.indexOf("@")==-1){
            alert("Please enter write email please! ");
            document.getElementById(id).focus();
        }
    }
    function checkEmail(){
        var emailCheck = document.getElementById('exampleInputEmail1').value;
        if(emailCheck.indexOf("@")==-1){
            alert("Please enter write email please! ");
            document.getElementById('exampleInputEmail1').focus();
        }
    }
    function minLenthCheck(id){
        var checkPass = document.getElementById(id).value;
        if(checkPass.length<5){
            checkEmail();
            alert("Please enter password min length 5 !");
            document.getElementById(id).focus();
        }
    }
// compare password
    function comparePassword(){
        var $check1 = document.getElementById('password').value,
            $check2 = document.getElementById('admin_pass_confirm').value;
        if($check2!=$check1){
            alert("doesn't match password!!!");
            document.getElementById('admin_pass_confirm').focus();
        }
        checkEmail();
    }
//
    function comparePasswordId(id){
        var $check1 = document.getElementById('admin_pass').value,
            $check2 = document.getElementById('admin_pass_confirm').value;
        if($check2!=$check1){
            alert("doesn't match password!!!");
            document.getElementById('admin_pass_confirm').focus();
            document.getElementById(id).value="";
        }else{
            checkEmail();
        }
    }
    //  validation form in javascript
</script>