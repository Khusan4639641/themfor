<?php $this->layout('layout/layoutMessage',['status'=>true,'url'=>'','webName'=>'']) ?>
<section class="content">
    <style>
        .progress{
            display: none;
            margin:20px auto;
            padding:0;
            width:90%;
            height:30px;
            overflow:hidden;
            background:#e5e5e5;
            border-radius:6px;
        }

        .bar {
            position:relative;
            float:left;
            min-width:1%;
            height:100%;
            background: linear-gradient(to right, #bfccec 10%, #8da6d9 25%, #060ad9 100%);
        }

        .percent {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            margin:0;
            font-family:tahoma,arial,helvetica;
            font-size:12px;
            color:white;
        }
        /* My new codes */
        div.imgClass{
            margin: 1px;
            overflow: hidden;
            padding: 10px;
            display: inline-block;
            width: 150px;
            height: 150px;
            /*background: #cccccc;*/
            border: 1px #ccc solid;
            cursor: pointer;
        }
        div.imgClass:hover,div.videoClass:hover{
            background: #cccccc;
            border: 1px blue dotted;
        }
        div.videoClass{
            margin: 1px;
            overflow: hidden;
            padding: 5px;
            display: inline-block;
            width: 250px;
            height: 250px;
            /*background: #cccccc;*/
            border: 1px #ccc solid;
            cursor: pointer;
        }
        .imgClass img{
            width: 100%;
            height: 120px;
        }
        .videoClass video{
            width: 100%;
            height: 260px;
        }
        .imgClass p,.videoClass p{
            font-size: 16px;
            text-align: center;
            color: blue;
        }
        #div_img,#div_video{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .note-image-url{
            margin-bottom: 10px;
        }
        #backImage>a>img{
            width: 100%;
        }
        #imageShow>img,#imageShowArea>img,#videosShowArea>video{
            width: 100%;
        }
    </style>
    <div class="container-fluid">
        <br>
        <h3>New Message</h3>
        <hr>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Message content</h3>
                    </div>
                    <form onsubmit="return false;" id="messageContent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <label for="">Email <span style="color:red;">#email </span> (For name name <span style="color:red;">#name </span>) </label>
                                    <input type="email" autocomplete="off" list="list" id="emailAddInput" value="" name="email" class="form-control" placeholder="Email...">
                                    <datalist id="list">
                                        <? foreach ($emails as $email): ?>
                                            <option value="<?=$email?>">
                                        <? endforeach; ?>
                                    </datalist>
                                </div>
                                <div class="col-2">
                                    <label for="">Click for Add email</label><br>
                                    <button class="btn btn-outline-info" onclick="addWithEmail()"> Add </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="margin-top: 10px;" id="emailContent">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject" value="<?=$message->subject?>" class="form-control" placeholder="Subject...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Message</label>
                                    <textarea id="summernote" name="message"> <?=$message->org_copy ?> </textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <form onsubmit="return false;" id="filesContent" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">File attechment
                                <a type="button" class="btn btn-info btn-sm" onclick="showFiles()"  data-toggle="modal" data-target="#modal-file">From uploads file</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped" id="fileContent">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>File name</th>
                                    <th>Size</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <? $num=1;  if(isset($files) && !empty($files)): foreach ($files as $item): ?>
                                        <tr>
                                            <td style="padding-left:25px;"><?=$num?></td>
                                            <td><?=$item?>
                                                <input type="file" name="fileInputs[]" style="display:none" data-input="<?=$item?>" onchange="detailsFile(this)" value="<?=$item?>">
                                            </td>
                                            <td>-</td>
                                            <td>
                                            <a class="btn btn-block btn-danger btn-xs" onclick="deleteTableRow(this)">Delete</a></td>
                                        </tr>
                                    <? $num++; endforeach;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </form>

        <button type="button" onclick="sendAjax()" class="btn btn-block btn-outline-success btn-lg">Submit</button>
    </div>
    <!--    modals-->
    <div class="modal fade" id="modal-file">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload files</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="padding: 20px; display: flex;justify-content: space-between;">
                    <input type="text" class="form-control" onkeyup="Search(this)" placeholder="Serach Off file..." style="margin-right: 10px"/>
                    <button class="btn btn-outline-dark" onclick="searchingFile(this)" > Search </button>
                </div>
                <div class="modal-body" id="div_file">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <!--    Ajax-->
    <script src="/web/assets/tools/new_message.js">
    </script>
    <!-- /.container-fluid -->
</section>