<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<section class="content">
    <style>
        .flexForm{
            border: 1px dashed blue;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .flexForm>div{
            margin-right: 20px;
        }
        .flexForm input{
            margin-right: 5px;
        }
        .formDiv label{
            position: relative;
            color: red;
            top: 20px;
            left: 20px;

            padding: 0px 5px;
            font-style: italic;
        }
    /*    Details */
        .flexFormDetails{
            border: 1px solid #cccccc;
            padding: 10px;
            display: flex;
        }
        .formDivDetails label{
            position: relative;
            color: #1d455b;
            top: 17px;
            left: 10px;
            padding: 0px 5px;
            font-style: italic;
        }
        /* this is for move */
        .draggable {
            cursor: move;
        }

        .draggable.dragging {
            opacity: .7;
        }
        .divHeader,.workPlace{
            border: 1px solid rgba(0,0,0,.4);
            padding: 20px;
            box-shadow: 5px 5px 5px #cccccc;
            border-radius: 10px;
            background-color: #f1f1f1;
        }
        .workPlace{
            border: 1px solid rgba(0,0,0,.4);
            background-color: #fafafa;
            box-shadow: 7px 7px 7px #536872;
            position: relative;
            z-index: 1;
            font-family: 'PangramLight';
        }
        .divHeader:hover{
            box-shadow: 10px 10px 15px black;
        }
        .workPlace:hover{
            box-shadow: 15px 15px 20px black;
        }
        #backImage>a>img{
            width: 100%;
        }
        #imageShow>img,#imageShowArea>img,#videosShowArea>video{
            width: 100%;
        }
        #bodyExample{
            overflow: auto;
            position: relative;
        }
        h3#settingButton:hover{
            background-color: blue;
            opacity: 0.8;
            color: white;
        }
        .select2-container--default .select2-selection--single {
            height: 35px;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        .flexForm input[name='offer']
        {
            margin-top: 7px;
            position: absolute;
        }
        span#text{
            text-indent: 15px;
        }
    </style>
    <form onsubmit="return false;">
        <div class="container-fluid">
            <br>
            <? if(isset($type) && !empty($type)): ?>
                <h3><? if(isset($forms->form_name) && !empty($forms->form_name)) echo "Form copy <a href='/form-create/' class='btn btn-outline-info'>New Form</a>"; else echo "Form creator"; ?></h3>
            <? else: ?>
                <h3><? if(isset($forms->form_name) && !empty($forms->form_name)) echo "Form update <a href='/form-create/' class='btn btn-outline-info'>New Form</a>"; else echo "Form creator"; ?></h3>
            <? endif; ?>

            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="divHeader">
                        <label for="formName" style="font-style: italic;">Form Name </label>
                        <? if(isset($type) && !empty($type)): ?>
                                <input type="text" id="formName" onkeyup="changeFormName(this)" value="<? if(isset($forms->form_name) && !empty($forms->form_name)) echo $forms->form_name."-copy"; else echo 'Form constructor place'; ?>" class="form-control" name=""/>
                        <? else: ?>
                                <input type="text" id="formName" onkeyup="changeFormName(this)" value="<? if(isset($forms->form_name) && !empty($forms->form_name)) echo $forms->form_name; else echo 'Form constructor place'; ?>" class="form-control" name=""/>
                        <? endif; ?>

                        <hr color="blue" style="opacity: 0.5">
                        <? if(isset($forms->form_name) && !empty($forms->form_name)): ?>
                            <? if(isset($type) && !empty($type)): ?>
                                <button class="btn btn-outline-success" onclick="saveToDB(<?= $forms->id ?>)" style="width: 100%;">Save new copy</button>
                            <? else: ?>
                                <button class="btn btn-outline-success" onclick="saveUpdateToDB(<?= $forms->id ?>)" style="width: 100%;">Save changes</button>
                            <? endif; ?>
                        <? else: ?>
                            <button class="btn btn-outline-success" onclick="saveToDB()" style="width: 100%;">Save</button>
                        <? endif; ?>
                    </div>
                    <br>
                </div>
            </div>
            <hr color="blue">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Select form type</h5>
                        </div>
                        <div class="card-body">
                            <button type="button" onclick="ajax.select('select')" class="btn btn-block btn-outline-primary btn-sm">Select</button>
                            <button type="button" onclick="ajax.select('input:text')" class="btn btn-block btn-outline-primary btn-sm">Text input</button>
                            <button type="button" onclick="ajax.select('text')" class="btn btn-block btn-outline-primary btn-sm">Text</button>
                            <button type="button" onclick="ajax.select('text:offer')" class="btn btn-block btn-outline-primary btn-sm">Accept  Text</button>
                            <button type="button" onclick="ajax.select('date')" class="btn btn-block btn-outline-primary btn-sm">Date input</button>
                            <button type="button" onclick="ajax.select('time')" class="btn btn-block btn-outline-primary btn-sm">Time input</button>
                            <button type="button" onclick="ajax.select('input:email')" class="btn btn-block btn-outline-primary btn-sm">Email input</button>
                            <button type="button" onclick="ajax.select('input:checkbox')" class="btn btn-block btn-outline-primary btn-sm">CheckBox</button>
                            <button type="button" onclick="ajax.select('input:radio')" class="btn btn-block btn-outline-primary btn-sm">RadioBox</button>
                            <button type="button" onclick="ajax.select('textarea')" class="btn btn-block btn-outline-primary btn-sm">TextArea</button>
                            <button type="button" onclick="ajax.select('file')" class="btn btn-block btn-outline-primary btn-sm">File input</button>
                            <button type="button" onclick="ajax.select('captcha')" class="btn btn-block btn-outline-primary btn-sm">Captcha</button>
                            <button type="button" onclick="ajax.select('button')" class="btn btn-block btn-outline-primary btn-sm">Submit</button>
                            <hr color="blue">
                            <button onclick="ajax.select('input:@email')" class="btn btn-block btn-outline-info btn-sm">Email confirm set</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-blue card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Work Place  </h5>
                            <button type="button" class="btn btn-block btn-outline-danger" style="width: 200px;float: right; " onclick="DeleteDivSelect()">Delete input</button>
                        </div>
                        <div class="card-body">
                            <div id="bodyExample">
                                <? if ( isset($forms) && !empty($forms) ): ?>
                                        <? if ( isset($type) && !empty($type) ): ?>
                                            <h5 style="font-style: italic;margin-top: 10px;text-align: center;color: #989898;position: relative;z-index: 2" id="FormName"><?=$forms->form_name."-copy"?></h5>
                                        <? else: ?>
                                            <h5 style="font-style: italic;margin-top: 10px;text-align: center;color: #989898;position: relative;z-index: 2" id="FormName"><?=$forms->form_name?></h5>
                                        <? endif; ?>
                                    <?= $forms->form_div ?>
                                <? else: ?>
                                    <h5 style="font-style: italic;margin-top: 10px;text-align: center;color: #989898;position: relative;z-index: 2" id="FormName">Form constructor place</h5>
                                    <div class="workPlace" id="workPlace" style="padding: 10px;border-radius: 5px;background: rgba(0,0,0,1);position: relative;"></div>
                                <? endif; ?>
                            </div>
                            <hr color="#cccccc">
                                <p style="color: #cccccc;font-size: 25px;text-align: center;">+</p>

                            <div>
                                <hr color="blue">
                                <h5 style="text-align: center;cursor: pointer;border: 1px blue solid;border-radius: 20px;padding: 5px;" id="settingButton" onclick="showSetting()">Advanced settings</h5>
                                <div id="Settings" style="display: none;">
                                    <h5> Form </h5>
                                    <div style="display: flex;justify-content: space-between;border: 1px dotted #ccc;padding: 10px">
                                        <div style="width: 100%;">
                                            <span style="display: flex;justify-content: space-between;">Background color: <input type="color" value="" id="FormColor" onclick="formColor(this)" onchange="formColor(this)"></span><br>
                                            <span style="display: flex;justify-content: space-between;">Background opacity: <span>0.6</span>  <input type="range" value="0.6" min="0" max="1" step="0.1" id="FormOpacity" onchange="formOpacity(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Text color: <input type="color" value="#ffffff" id="textColor" onclick="formTextColor(this)" onchange="formTextColor(this)"></span><br>
                                            <span style="display: flex;justify-content: space-between;align-items: center;">Desktop Width:
                                                <div style=" display: flex;justify-content: space-between;border: 1px dotted #ccc;padding: 10px;">
                                                     <input type="int"  value="100" onkeyup="setWidthForm()" class="form-control" id="formWidth">
                                                        <select onchange="setWidthForm()" id="ext">
                                                            <option value="%">%</option>
                                                            <option value="px">PX</option>
                                                        </select>
                                                    </div>
                                            </span><br>
                                            <span style="display: flex;justify-content: space-between;align-items: center;">Mobile Width:
                                                <div style=" display: flex;justify-content: space-between;border: 1px dotted #ccc;padding: 10px;">
                                                     <input type="int"  value="100" onkeyup="setWidthFormMobile()" class="form-control" id="formWidthMobile">
                                                        <select onchange="setWidthFormMobile()" id="extMobile">
                                                            <option value="%">%</option>
                                                            <option value="px">PX</option>
                                                        </select>
                                                    </div>
                                            </span><br>
                                        </div>
                                    </div>
                                    <hr color="red">
                                    <h5> Body </h5>
                                    <div style="display: flex;justify-content: space-between;border: 1px dotted #ccc;padding: 10px">
                                        <div style="width: 30%">
                                            <div id="backImage" style="padding-right: 10px;">
                                                <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="setImage('Body')" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-image">Choose</button>
                                                <a href="#">
                                                    <img src="" id="selectBodyImage" alt="This is image for body">
                                                    <span style="color: red; display: none">No image yet</span>
                                                </a>
                                                <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="removeImage()" class="btn btn-outline-dark">Remove</button>

                                            </div>
                                        </div>
                                        <div style="width: 70%;">
                                            <span style="display: flex;justify-content: space-between;">Background color: <input type="color" value="" id="backColor" onclick="bodyColor(this)" onchange="bodyColor(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Blur: <input type="number" value="0" max="20" id="backBlurBody" onchange="bodyColorBlur(this)" onkeyup="bodyColorBlur(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Text color: <input type="color" value="#FF0000" id="backColorBody" onclick="bodyColorText(this)" onchange="bodyColorText(this)" ></span><br>
                                        </div>
                                    </div>
                                    <hr color="red">
                                    <h5>Url</h5>
                                    <div style=" display: flex;justify-content: space-between;align-items: center; border: 1px dotted #ccc;padding: 10px; ">
                                        <span style="margin-right: 10px;"><?=$_SERVER['SERVER_NAME'] ?>/data/ </span>
                                        <? if ( isset($type) && !empty($type) ): ?>
                                                <input type="text" data-url = "<?= $forms->url."-copy" ?>" value="<?= $forms->url."-copy" ?>" onchange="setFormUrl(this)" class="form-control" id="urlForm" >
                                        <? else: ?>
                                            <input type="text" data-url = "<?= $forms->url ?>" value="<?= $forms->url ?>" onchange="setFormUrl(this)" class="form-control" id="urlForm" >
                                        <? endif; ?>
                                    </div>
                                    <span id="errorMessage" style="color: red;font-style: italic;text-align: center;"></span>
                                    <button onclick="generateUrl()" class="btn btn-outline-dark" style="width: 100%;">Generate Url</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h5 class="card-title" id="infoDetails">Details</h5>
                        </div>
                        <div class="card-body" id="details">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 card card-info card-outline">
                    <div class="card-header">
                        <h6 style="color: red">Email confirm message #name </h6>
                    </div>
                    <div class="card-body" id="div_Email">
                        <textarea name="" id="email_message" class="form-control" rows="10"> <? if(isset($forms->messageG) && !empty($forms->messageG)): echo $forms->messageG;endif;?> </textarea>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="modal fade" id="modal-image">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Image select</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="display: flex;max-height: 500px;">
                        <div style="width:50%;overflow-y: scroll;border: 1px solid #ccc;padding: 20px;" id="Images">
                            <?
                                foreach ($images as $image): ?>
                                    <img src="/<?=$image?>" data-images="<?=$image?>" style="width: 100px;cursor: pointer;margin: 5px;" onclick="showImage(this)" alt="">
                            <? endforeach; ?>
                        </div>
                        <div style="width: 50%;border: 1px solid black;padding: 20px;" id="imageShow">

                        </div>
                        <form method="post" action="" enctype="multipart/form-data" style="display: none;">
                            <input type="file" value="" onchange="uploadImage(this)" id="fileUpload" style="display: none;"/>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="uploadImageClick()">Upload new image</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
    <!-- /.container-fluid -->
</section>