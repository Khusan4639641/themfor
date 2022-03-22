<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$url?></title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/web/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/toastr/toastr.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/web/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/web/assets/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/web/assets/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">


    <link rel="stylesheet" href="/web/assets/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/codemirror/theme/monokai.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/simplemde/simplemde.min.css">

    <link rel="stylesheet" href="/web/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/web/assets/styles/landing.css">
    <style>
        @font-face {
            font-family: PangramBlack;
            src: url('/web/assets/pangram/Pangram-Black.otf') format('truetype');
        }
        @font-face {
            font-family: PangramBold;
            src: url('/web/assets/pangram/Pangram-Bold.otf') format('truetype');
        }
        @font-face {
            font-family: PangramExtraBold;
            src: url('/web/assets/pangram/Pangram-ExtraBold.otf') format('truetype');
        }
        @font-face {
            font-family: PangramExtraLight;
            src: url('/web/assets/pangram/Pangram-ExtraLight.otf') format('truetype');
        }
        @font-face {
            font-family: PangramLight;
            src: url('/web/assets/pangram/Pangram-Light.otf') format('truetype');
        }
        @font-face {
            font-family: PangramMedium;
            src: url('/web/assets/pangram/Pangram-Medium.otf') format('truetype');
        }
        @font-face {
            font-family: PangramRegular;
            src: url('/web/assets/pangram/Pangram-Regular.otf') format('truetype');
        }
    </style>
</head>
<body id="template">
<?=$template['menu']->menu;?>
<?=$template['template']->template ?>
<div id="backTemplate" ></div>
<br>
<button onclick="saveTemplate()" class="btn btn-outline-success" style="margin: 0px auto 10px;display: block">Save All</button>
<h5 style="width: 300px;text-align: center;cursor: pointer;border: 1px blue solid;border-radius: 20px;padding: 5px;margin: 0px auto;color: blue;background-color: white" id="settingButton" onclick="showSetting()">Landing creator</h5>
<br>
<section id="Settings" style="display: none;padding: 20px; width: 90%;margin: 0px auto 20px; border: 1px black solid; border-radius: 20px; box-shadow: 5px 5px 5px black" class="content">
    <div style="display: flex;">
        <h6 id="settingMenu" style="width: 300px;text-align: center;cursor: pointer;border: 1px blue solid;border-radius: 20px;padding: 5px;margin: 0px auto;color: blue;background-color: white" onclick="settingMenuHide(this)">Show menu settings</h6>
        <h6 style="width: 300px;text-align: center;cursor: pointer;border: 1px blue solid;border-radius: 20px;padding: 5px;margin: 0px auto;color: blue;background-color: white" id="settingTemplate" onclick="settingTemplateHide(this)">Show temlate settings</h6>
    </div>
    <hr color="blue">
    <div id="pages" style="display: inline-block; padding: 10px;" >
        <? if(isset($listTemple) && !empty($listTemple)): foreach ($listTemple as $temp): ?>
            <a onclick="ajax.selectTemplate(this)" class="btn btn-outline-info btn-sm">Page id: <?=$temp->id ?> <span data-id = "<?=$temp->id ?>" onclick="ajax.deletePage(this)"
                                                                                                                      style="color: red;font-weight: bold; margin-left: 10px;font-size: 20px;">x</span></a>
        <? endforeach; endif;  ?>
    </div>
    <div id="advanced" style="display: none" class="container-fluid">

        <hr>
        <div class="row">

            <div class="col-md-3">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Menus</h5>
                    </div>
                    <div class="card-body" id="menu-list">

                    </div>
                    <br>
                    <br>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-blue card-outline">
                    <div class="card-header">
                        <div style="display: flex; flex-wrap: wrap;justify-content: space-between;align-items: center">
                            <div style="width: 45%;border:1px black solid;border-radius: 10px;padding: 10px;">
                                <h6 style="text-align: center;">Move</h6>
                                <div style="display: flex;justify-content: space-between;">
                                    <a class="btn btn-outline-dark btn-sm" onclick="changeDivPosition('top')"> Top </a>
                                    <a class="btn btn-outline-dark btn-sm" onclick="changeDivPosition('bottom')"> Bottom </a>
                                </div>
                            </div>
                            <div style="width: 45%; border:1px black solid;border-radius: 10px;padding: 10px;">
                                <h6 style="text-align: center;">Clone and delete</h6>
                                <span style="display: flex;align-items: center;justify-content: space-between;">
                                    <a class="btn btn-outline-info btn-sm" onclick="cloneDiv()">clone</a>&nbsp;
                                    <a class="btn btn-outline-danger btn-sm" onclick="deleteDiv()">delete</a>
                                </span>
                            </div>
                        </div>
                        <hr color="blue"><br>
                        <h5 class="card-title" style="width: 100%;text-align: center;">
                            <a class="btn btn-outline-dark btn-sm" id="addPage">Add page</a>
                            <span>=></span>
                            <a class="btn btn-outline-info btn-sm" id="addBlog">Add block</a>
                            <span>=></span>
                            <a class="btn btn-outline-success btn-sm" id="addElement">Add element </a>

                        </h5>
                    </div>
                    <div class="card-body">
                        <div style="padding: 10px;border:1px black dotted;box-shadow: 5px 5px 5px black; margin-bottom: 10px;display: flex;align-items: center;justify-content: space-between">
                            <span> Url of page: </span>
                            <span style="display: flex;align-items: center"><?=$_SERVER['SERVER_NAME'] ?>&nbsp;/&nbsp; <input id="pageUrl" style="width: 80%" type="text" value="<?=$template['template']->url ?>" class="form-control"></span>
                        </div>
                    </div>
                </div>
                <div>
                    <hr color="blue">
                    <div style="padding: 20px;border:1px #ccc solid;border-radius: 20px; background-color: white">
                        <h5> Body </h5>
                        <hr color="red">
                        <div style="display: flex;justify-content: space-between;border: 1px solid black;padding: 20px;box-shadow: 5px 5px 3px black;border-radius: 10px;">
                            <div style="width: 100%;">

                                <label for="">Color</label>
                                <div style="border: 1px #ccc solid;padding: 10px;">
                                <span style="display: flex;justify-content: space-between;">Background:
                                    <input type="color" value=""  data-property = "background-color:"
                                           id="body-back-color" onclick="setStyleBody(this)" onchange="setStyleBody(this)">
                                </span><br>

                                    <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>
                                <input id="body-opacity"  data-property = "opacity:"
                                       type="range" value="1" min="0" max="1" step="0.1" onchange="setStyleBody(this)" >
                                </span><br>

                                </div>
                                <br>
                                <div style="display: flex;justify-content: space-between;">
                                    <div style="width: 30%">
                                        <div id="backImage" style="padding-right: 10px;">
                                            <label for="">Background image</label>
                                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="setImage('Body')" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-image">Choose</button>
                                            <a href="#">
                                                <img src=""  data-property = "background-image:" id="selectBodyImage" alt="This is image for body">
                                                <span style="color: red; display: none">No image yet</span>
                                            </a>
                                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="removeImage('Body')" class="btn btn-outline-dark">Remove</button>

                                        </div>
                                    </div>
                                    <div style="width: 70%;">
                                        <label for="">Others</label>
                                        <div style="border: 1px #ccc solid;padding: 10px;">
                                            <span style="display: flex;justify-content: space-between;">Blur:
                                                <input type="number" value="0" max="20" id="body-blur"  data-property = "filter:" onchange="setStyleBody(this)" onkeyup="setStyleBody(this)" >
                                            </span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5 style="display: flex;justify-content: space-between;align-items: center"> Blocks or Elements Style</h5>
                        <hr>
                        <hr color="red">
                        <div style="display: flex;justify-content: space-between;border: 1px dotted black;padding: 20px;box-shadow: 5px 5px 3px black;border-radius: 10px;">
                            <div id="styleBlock" style="width: 100%; display: none; ">

                                <div style="border: 1px #ccc solid;padding: 10px;">
                                    <span style="display: flex;justify-content: space-between;align-items: center;">Width:
                                                    <div style=" display: flex;justify-content: space-between;border: 1px dotted #ccc;padding: 10px;">
                                                         <input type="number"  value="100" onkeyup="setStyleBlock(this)"  onclick="setStyleBlock(this)" class="form-control block-back-width"
                                                                data-property = "margin:0px auto;width:">
                                                            <select onchange="setStyleBlock(this)"  id="block-width-ext">
                                                                <option value="%">%</option>
                                                                <option value="px">PX</option>
                                                            </select>
                                                        </div>
                                                </span><br>
                                </div>
                                <br>
                                <div class="flexSetting" style="border: 1px blue dotted;padding: 10px;margin-bottom: 20px;border-radius: 10px">
                                    <h5 style="text-align: center;">Flex </h5>
                                    <siv style="display: flex;flex-flow: row wrap; justify-content: space-between;" id="flexBlog">
                                        <span>Left: <input type="radio" name="flex" value="flex-start" onclick="setStyleBlock(this)" data-property = "justify-content:" class="block-flex"></span>
                                        <span>Center: <input type="radio" name="flex" value="center" onclick="setStyleBlock(this)" data-property = "justify-content:" class="block-flex"></span>
                                        <span>Right: <input type="radio"  name="flex" value="flex-end" onclick="setStyleBlock(this)" data-property = "justify-content:" class="block-flex"></span>
                                        <span>Space around: <input type="radio" name="flex" value="space-around" onclick="setStyleBlock(this)" data-property = "justify-content:" class="block-flex"></span>
                                        <span>Space between: <input type="radio" name="flex" value="space-between" onclick="setStyleBlock(this)" data-property = "justify-content:" class="block-flex"></span>
                                    </siv>
                                </div>
                                <div style="display:flex;justify-content: space-between;">
                                    <div style="width: 45%;">
                                        <label for="">Color</label>
                                        <div style="border: 1px #ccc solid;padding: 10px;">
                                            <span style="display: flex;justify-content: space-between;">Background: <input type="color" class="block-back-color" value="#ffffff" data-property = "background-color:" onclick="setStyleBlock(this)" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>  <input type="range" id="block-back-opacity" value="1" min="0" max="1" step="0.1" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: none;justify-content: space-between;">Text: <input type="color" class="block-text-color" value="#000000" data-property = "color:" onclick="setStyleBlock(this)" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Blur:
                                                <input type="number" style="width: 90%" value="0" max="20" class="block-blur" onchange="setStyleBlock(this)" onkeyup="setStyleBlock(this)" data-property = "backdrop-filter:" >
                                            </span><br>
                                        </div>
                                    </div>
                                    <div style="width: 45%;">
                                        <label for="">Hover Color</label>
                                        <div style="border: 1px #ccc solid;padding: 10px;">
                                            <span style="display: flex;justify-content: space-between;">Background: <input type="color" value="" class="block-hover-back-color"  data-property = "background-color:" onclick="setStyleBlock(this)" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>  <input type="range" value="1" min="0" max="1" step="0.1" id="block-hover-opacity" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: none;justify-content: space-between;">Text: <input type="color" value="" class="block-hover-text-color" data-property = "color:" onclick="setStyleBlock(this)" onchange="setStyleBlock(this)" ></span><br>
                                            <span style="display: flex;justify-content: space-between;">Blur:
                                                <input type="number" style="width: 90%" value="0" max="20" class="block-hover-blur" onchange="setStyleBlock(this)" onkeyup="setStyleBlock(this)" data-property = "backdrop-filter:" >
                                            </span><br>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <label for="">Border</label>
                                <div style="border: 1px #ccc solid;padding: 10px;">

                                    <span style="display: flex;justify-content: space-between;align-items: center;">Radius:
                                                <div style=" display: flex;justify-content: space-between;align-items: center; border: 1px dotted #ccc;padding: 10px;">
                                                     <input type="text"  style="width: 50px" value="10" data-property = "border-top-left-radius:" onclick="setStyleBlock(this)" onkeyup="setStyleBlock(this)" class="form-control border-radius">
                                                     <input type="text"  style="width: 50px" value="10" data-property = "border-top-right-radius:" onclick="setStyleBlock(this)" onkeyup="setStyleBlock(this)" class="form-control border-radius" >
                                                     <input type="text"  style="width: 50px" value="10" data-property = "border-bottom-left-radius:" onclick="setStyleBlock(this)" onkeyup="setStyleBlock(this)" class="form-control border-radius" >
                                                     <input type="text"  style="width: 50px" value="10" data-property = "border-bottom-right-radius:" onclick="setStyleBlock(this)" onkeyup="setStyleBlock(this)" class="form-control border-radius" >PX
                                                    </div>
                                            </span><br>
                                </div>
                                <br>
                                <div style="display: flex;justify-content: space-between;">
                                    <div style="width: 30%">
                                        <div id="backImage" style="padding-right: 10px;">
                                            <label for="">Background image</label>
                                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="setImage('Block')" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-image">Choose</button>
                                            <a href="#">
                                                <img src="/" id="selectBlockImage" data-property = "background-repeat:no-repeat;background-size:cover;background-image:" class="block-back-img" alt="This is image for body">
                                                <span style="color: red; display: none">No image yet</span>
                                            </a>
                                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="removeImage('Block')" class="btn btn-outline-dark">Remove</button>

                                        </div>
                                    </div>
                                    <div style="width: 70%;">
                                        <label for="">Others</label>
                                        <div style="border: 1px #ccc solid;padding: 10px;">
                                            <span style="display: flex;justify-content: space-between;align-items: center;">Padding:
                                                <div style=" display: flex;justify-content: space-between;align-items: center;border: 1px dotted #ccc;padding: 10px;">
                                                     <input type="int"  style="width: 50px" value="10" onkeyup="setStyleBlock(this)" class="form-control block-padding"  data-property = "padding-top:">&nbsp;
                                                     <input type="int"  style="width: 50px" value="10" onkeyup="setStyleBlock(this)" class="form-control block-padding"  data-property = "padding-right:">&nbsp;
                                                     <input type="int"  style="width: 50px" value="10" onkeyup="setStyleBlock(this)" class="form-control block-padding"  data-property = "padding-bottom:">&nbsp;
                                                     <input type="int"  style="width: 50px" value="10" onkeyup="setStyleBlock(this)" class="form-control block-padding"  data-property = "padding-left:">&nbsp;PX
                                                    </div>
                                            </span><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <hr color="red">
                        <span id="errorMessage" style="color: red;font-style: italic;text-align: center;"></span>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-3">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Active forms list</h5>
                    </div>
                    <div class="card-body" style="max-height: 500px;overflow-y: scroll">
                        <? if(isset($forms) && !empty($forms)):
                            foreach ($forms as $form): ?>
                                <div class="formDivDetails">
                                    <label><?=$form->form_name ?></label>
                                    <div class="formPasteDetails" >
                                        <div class="flexFormDetails">
                                            <a class='btn btn-outline-info' onclick="pasteForm(this)" data-name = "<?=$form->form_name ?>" data-link = "/data/<?=$form->url ?>" style="width: 100%"> Paste </a>
                                            <a href="/data/<?=$form->url ?>" class="btn btn-outline-success" target="_blank" style="width: 100%;margin-left: 10px;"> View </a>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <div id="advancedMenu" style="display: none" class="container-fluid">

        <hr>
        <div class="row">

            <div class="col-md-4">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title" style="color: blue;">MENU SETTINGS </h5>
                    </div>

                    <div class="card-body" id="menuSettings" style="box-shadow: 5px 5px 5px black;border: 1px black solid;border-radius: 10px;">

                        <label for="">Color</label>
                        <div style="border: 1px #ccc solid;padding: 10px;">

                            <span style="display: flex;justify-content: space-between;">Background:
                                <input type="color" value=""  data-property = "background-color:"
                                       id="menu-back-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>
                                <input id="menu-opacity"  data-property = "opacity:"
                                       type="range" value="1" min="0" max="1" step="0.1" onchange="setStyle(this)" >
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Text:
                                <input type="color" value=""  data-property = "COLOR:"
                                       id="menu-text-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                        </div>
                        <br>
                        <label for="">Hover color</label>
                        <div style="border: 1px #ccc solid;padding: 10px;">

                            <span style="display: flex;justify-content: space-between;">Background:
                                <input type="color" value=""  data-property = "background-color:"
                                       id="menu-hover-back-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Opacity:
                                <span>1</span>  <input type="range"  data-property = "opacity:"
                                                       value="1" min="0" max="1" step="0.1" id="menu-hover-opacity" onchange="setStyle(this)" >
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Text:
                                <input type="color" value=""  data-property = "COLOR:"
                                       id="menu-hover-text-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                        </div>
                        <br>
                        <label for="">Active color</label>

                        <div style="border: 1px #ccc solid;padding: 10px;">
                            <span style="display: flex;justify-content: space-between;">Background:
                                <input type="color" value=""  data-property = "background-color:"
                                       id="menu-active-back-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>
                                <input type="range" value="1" min="0" max="1" step="0.1"
                                       data-property = "opacity:"
                                       id="menu-active-opacity" onchange="setStyle(this)" >
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Text:
                                <input type="color" value=""  data-property = "COLOR:"
                                       id="menu-active-text-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                        </div>
                        <br>
                        <label for="">Dropdown color</label>
                        <div style="border: 1px #ccc solid;padding: 10px;">

                            <span style="display: flex;justify-content: space-between;">Background:
                                <input type="color" value=""
                                       data-property = "background-color:"
                                       id="menu-dropdown-back-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>
                                <input type="range" value="1" min="0" max="1"  data-property = "opacity:"
                                       step="0.1" id="menu-dropdown-opacity" onchange="setStyle(this)" >
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Text:
                                <input type="color" value="" data-property = "COLOR:"
                                       id="menu-dropdown-text-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                        </div>
                        <br>
                        <label for="">Dropdown hover color</label>
                        <div style="border: 1px #ccc solid;padding: 10px;">

                            <span style="display: flex;justify-content: space-between;">Background:
                                <input type="color" value=""
                                       data-property = "background-color:"
                                       id="menu-dropdown-hover-back-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Opacity: <span>1</span>
                                <input type="range" value="1" min="0" max="1" step="0.1"
                                       data-property = "opacity:"
                                       id="menu-dropdown-hover-opacity" onchange="setStyle(this)" >
                            </span><br>

                            <span style="display: flex;justify-content: space-between;">Text:
                                <input type="color" value=""  data-property = "COLOR:"
                                       id="menu-dropdown-hover-text-color" onclick="setStyle(this)" onchange="setStyle(this)">
                            </span><br>

                        </div>
                        <br>
                        <label for="">Text font</label>
                        <div style="border: 1px #ccc solid;padding: 10px;">

                            <span style="display: flex;justify-content: space-between;align-items: center;">Style:
                                <select name=""  class="form-control" data-property = "font-style:"
                                        id="menu-font-style" onchange="setStyle(this)">
                                        <option value="normal">Normal</option>
                                        <option value="italic">Italic</option>
                                </select>
                            </span><br>

                            <span style="display: flex;justify-content: space-between;align-items: center;">Family:
                                <select name=""  class="form-control" data-property = "font-family:"
                                        id="menu-font-family" onchange="setStyle(this)">
                                        <option value="Verdana, sans-serif">Verdana, sans-serif</option>
                                        <option value="Georgia, serif">Georgia, serif</option>
                                        <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
                                        <option value="'Times New Roman', Times, serif">"Times New Roman", Times, serif</option>
                                        <option value="PangramBlack">PangramBlack</option>
                                        <option value="PangramBold">PangramBold</option>
                                        <option value="PangramExtraBold">PangramExtraBold</option>
                                        <option value="PangramExtraLight">PangramExtraLight</option>
                                        <option value="PangramLight">PangramLight</option>
                                        <option value="PangramMedium">PangramMedium</option>
                                        <option value="PangramRegular">PangramRegular</option>
                                </select>
                            </span><br>

                            <span style="display: flex;justify-content: space-between;align-items: center;">Weight:
                                <select name=""  class="form-control" data-property = "font-weight:"
                                        id="menu-font-weight" onchange="setStyle(this)">
                                        <option value="normal">Normal</option>
                                        <option value="bold">Bold</option>
                                </select>
                            </span><br>

                            <span style="display: flex;justify-content: space-between;align-items: center;align-items: center;">Size:
                                <input type="number" max="30" min="10" value="14" class="form-control"  data-property = "font-size:"
                                       id="menu-font-size" onchange="setStyle(this)">&nbsp;:PX
                            </span><br>
                        </div>
                        <div id="backImage" style="padding-right: 10px;">
                            <label for="">Logo image <span style="color: red;font-size: 12px;">( example size: width:100px;heigth:50px;)</span></label>
                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="setImage('Logo')" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-image">Choose</button>
                            <a href="#">
                                <img src="" id="selectLogoImage" alt="This is image for logo">
                                <span style="color: red; display: none">No image yet</span>
                            </a>
                            <button style="font-size: 14px;font-weight: bold;width: 100%" onclick="removeImageLogo()" class="btn btn-outline-dark">Remove</button>
                            <hr color="blue">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="background-color: white">

                <div id="menuDiv">
                    <div class="card-header">
                        <h5 class="card-title">Create menu</h5>
                    </div>

                </div>

                <hr color="blue">
                <div class="divMenu">
                    <div class="workPlaceV menuHead"></div>
                    <div class="workPlaceV menuSub"></div>
                </div>

                <div style="border:1px #ccc solid; border-radius: 20px;padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4" style="display: flex;justify-content: space-between;align-items: center"> <span>Name: </span>&nbsp; <input style="width: 70%" type="text" name="menuName" class="form-control"></div>
                        <div class="col-sm-8" style="display: flex;justify-content: space-between;align-items: center"> <span>Href: <?=$_SERVER['SERVER_NAME'] ?>/</span>&nbsp; <input type="text" name="menuHref" style="width: 70%" class="form-control"></div>
                    </div>
                    <br>
                    <div style="display: flex;justify-content: space-between;">
                        <div id="udpateMenu" style="justify-content: space-between; display: none;width: 45%">
                            <a class="btn btn-outline-dark" style="width: 45%;" onclick="updateMenu()"> Update Menu </a>
                            <a class="btn btn-outline-danger" style="width: 45%;" onclick="deleteMenuItem()"> Delete </a>
                        </div>
                        <a class="btn btn-outline-dark" id="addMenuButton" style="width: 45%;" onclick="addMenu()"> Add Menu </a>
                        <a class="btn btn-outline-success" style="width: 45%;" onclick="createMenu()"> Construct </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>

    <div class="card" style="margin-top: 20px;display: none;" id="summernoteDiv">
        <div class="card-header">
            <h5 class="card-title">Content</h5>
        </div>
        <div class="card-body">
            <textarea id="summernote" style="display:none;" name="message"></textarea>
            <a class="btn btn-outline-info" style="width: 100%" onclick="innerTextToElement()">Inner Info</a>
        </div>
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
    <!-- /.container-fluid -->
</section>
<script src="/web/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/web/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/web/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/web/assets/admin/dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/web/assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/web/assets/admin/plugins/raphael/raphael.min.js"></script>
<script src="/web/assets/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/web/assets/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/web/assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/web/assets/admin/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="/web/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/web/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="/web/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/web/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/web/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/web/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="/web/assets/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/web/assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/web/assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>




<script src="/web/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/web/assets/admin/plugins/codemirror/codemirror.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/web/assets/tools/landing.js" type="text/javascript"></script>
<script>
    FORM_ID = "<?=$template['template']->id ?>"
</script>
</body>
</html>