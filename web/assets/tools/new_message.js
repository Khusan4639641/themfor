$(function () {
    // Summernote
    $('#summernote').summernote({
        height: 400,   //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        },
        fontNames: ['PangramBlack','PangramBold','PangramExtraBold','PangramExtraLight','PangramLight','PangramMedium','PangramRegular'],
        fontNamesIgnoreCheck: ['PangramBlack','PangramBold','PangramExtraBold','PangramExtraLight','PangramLight','PangramMedium','PangramRegular'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['fontname', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ],
            table: [
                ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
            ],
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ]
        }
    });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
setTimeout(function (){
//      for image
    document.querySelector("button[data-original-title='Picture']").onclick = function (e) {
        let div = document.querySelector(".modal.note-modal.show")
        let past = div.querySelector("input[type='file']").parentNode.parentNode
        div.querySelector("input[type='file']").parentNode.remove()

        div.querySelector("input[type='text']").parentNode.style.with="100%"

        div.querySelector("div.form-group.note-group-image-url").setAttribute("style","width:100%;")
        ajax.imagesShow(past)
    }
//      for videos
    document.querySelector("button[data-original-title='Video']").onclick = function (e) {
        let div = document.querySelector(".modal.note-modal.show")
        let past = div.querySelector("div.modal-body")
        ajax.videosShow(past)
    }
    if(document.querySelector("input.note-video-btn")){
        document.querySelector("input.note-video-btn").onclick = function (e) {
            if(document.querySelector("video"))
                document.querySelectorAll("video").forEach(function (Video) {
                    Video.pause()
                })
        }
//          hidden video button
        document.querySelector("button[data-original-title=\"Video\"]").remove()
    }
},500)
var ajax = {
    ajaxMethod:'POST',
    Sending:function (data){
        var formData = new FormData()
        formData.append('file', data.files)
        formData.append('user', data.user)
        formData.append('email', data.email)
        formData.append('subject', data.subject)
        formData.append('message', data.message)

//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/message-new/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText.indexOf("error:")==-1)
                    {
                        message("success","Image successfully send to "+data.email)
                    }else
                        message("error",httpRequest.responseText.replace(/error:/,""))
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    fileUpload:function (data,el){
        var formData = new FormData()
        formData.append('file', data)

//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/upload-files/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText.indexOf("error:")==-1)
                    {
                        el.setAttribute("data-input",httpRequest.responseText)
                        el.setAttribute("data-upload",true)
                        message("success","Image successfully upload")
                    }else
                        message("error",httpRequest.responseText.replace(/error:/,""))
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    filesShow:function(div) {
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/files-show/')
        httpRequest.send();

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                            div.innerHTML = ""
                        let form = document.createElement("form")
                            form.setAttribute("method", "POST")
                            form.setAttribute("enctype", "multipart/form-data")
                            form.setAttribute("style", "display: none;")

                        let input = document.createElement("input")
                            input.setAttribute("type", "file")
                            input.setAttribute("id", "fileUploadArea")
                            input.setAttribute("name", "file")
                            input.setAttribute("value", "")
                            input.setAttribute("onchange", "uploadFileArea(this)")
                            input.setAttribute("style", "display: none;")
                            form.appendChild(input)

                        let $return = JSON.parse(httpRequest.responseText)

                        let DIV_0 = document.createElement("div")
                            DIV_0.setAttribute("style", "display: flex;max-height: 500px;")

                        let DIV_FILE = document.createElement("div")
                        let DIV_FILE_SHOW = document.createElement("div")

                            DIV_FILE_SHOW.setAttribute("style", "width: 50%;padding: 20px;")
                            DIV_FILE_SHOW.setAttribute("id", "fileShowArea")

                            DIV_0.appendChild(DIV_FILE)

                            DIV_FILE.setAttribute("id", "FilesArea")
                            DIV_FILE.setAttribute("style", "width:50%;overflow-y: scroll;border: 1px solid #ccc;padding: 20px;display:flex;flex-flow: row wrap;padding:10px;")

                            $return.forEach(function (file)
                            {
                                let img_DIV = document.createElement("div")
                                    img_DIV.setAttribute("style","overflow:hidden;width:120px;padding:10px;")
                                let span = document.createElement("span")
                                    span.setAttribute("style","display:inline-block;")
                                let spanX = document.createTextNode(file.replace(/web\/uploads\//gm,''))

                                    span.appendChild(spanX)

                                let imgDiv = document.createElement("img")
                                    imgDiv.setAttribute("data-files", file)
                                    imgDiv.setAttribute("src", "/web/assets/images/file.png")
                                    imgDiv.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                                    imgDiv.setAttribute("onclick", "showFileArea(this)")
                                    img_DIV.appendChild(imgDiv)
                                    img_DIV.appendChild(span)
                                    DIV_FILE.appendChild(img_DIV)
                            })
                        let button_set = document.createElement("button")
                        let button_set_text = document.createTextNode("Upload File")
                            button_set.setAttribute("class","btn btn-outline-info")
                            button_set.setAttribute("style","margin:10px auto;display: block;")
                            button_set.setAttribute("onclick","multiFile()")
                            button_set.append(button_set_text)

                            DIV_0.appendChild(DIV_FILE)
                            DIV_0.appendChild(DIV_FILE_SHOW)
                            div.appendChild(DIV_0)
                            div.appendChild(button_set)
                            div.appendChild(form)
                } else
                    message('error','There was a problem with the request.')
            }
        }
    },
    fileInsert:function(file) {

    var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()
        httpRequest.open(this.ajaxMethod, '/file-size/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                        let fileName = file.replace(/web\/uploads\//gm,'')
                        let size = httpRequest.responseText
                        let tableRows = document.getElementById('fileContent');
                        var countRows = tableRows.rows.length
                //
                        var tr = document.createElement('tr');
                        var td1 = document.createElement('td');
                            td1.setAttribute('style','padding-left:25px;');
                        var td2 = document.createElement('td');
                        let td2_X = document.createTextNode(fileName)
                            td2.appendChild(td2_X)
                        var td3 = document.createElement('td');
                        let td3_X = document.createTextNode(size+" bayt")
                            td3.appendChild(td3_X)
                        var td4 = document.createElement('td');
                        var numberText = document.createTextNode(countRows);

                        var fileInputs = document.createElement('input');
                            fileInputs.setAttribute('type','file');
                            fileInputs.setAttribute('name','fileInputs[]');
                            fileInputs.setAttribute('style','display:none');
                            fileInputs.setAttribute('data-input',fileName);
                            fileInputs.setAttribute('onchange','detailsFile(this)');
                            fileInputs.setAttribute('value','');
                            td1.appendChild(numberText);
                            td2.appendChild(fileInputs);

                        var aDelete = document.createElement('a');
                            aDelete.setAttribute('class','btn btn-block btn-danger btn-xs');
                            aDelete.setAttribute('onclick','deleteTableRow(this)');

                        var aText = document.createTextNode('Delete');
                            aDelete.appendChild(aText);
                            td4.appendChild(aDelete);
                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            tableRows.appendChild(tr);
                        message('success','File set successfully!')
                } else
                    message('error','There was a problem with the request.')
            }
        }
    },
    deleteFormFileArea:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/delete-upload-file/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText!='error')
                        document.querySelectorAll("img[data-files='"+httpRequest.responseText+"']").forEach(function (div) {
                            div.parentNode.remove()
                        })
                    document.getElementById("fileShowArea").innerHTML = ""
                    message("success","Delete successfully")
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    ImageUploadArea:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/upload-form-image/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText.indexOf("error:")==-1)
                    {
                        let img = document.createElement('img')
                        img.setAttribute("style","width: 100px;cursor: pointer;margin: 5px;")
                        img.setAttribute("src","/web/form/images/"+httpRequest.responseText)
                        img.setAttribute("data-images","web/form/images/"+httpRequest.responseText)
                        img.setAttribute("onclick","showImageArea(this)")

                        document.getElementById("ImagesArea").appendChild(img)

                        if (document.getElementById("Images")){
                            let img2 = img.cloneNode(true)
                            document.getElementById("Images").appendChild(img2)
                        }

                        message("success","Image successfully upload")
                    }else
                        message("error",httpRequest.responseText.replace(/error:/,""))
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    imagesShow:function(div) {
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/images-show/')
        httpRequest.send();

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(!document.querySelector("div#imageShowArea")) {
                        let form = document.createElement("form")
                        form.setAttribute("method", "POST")
                        form.setAttribute("enctype", "multipart/form-data")
                        form.setAttribute("style", "display: none;")
                        let input = document.createElement("input")
                        input.setAttribute("type", "file")
                        input.setAttribute("id", "fileUploadAreaImage")
                        input.setAttribute("name", "file")
                        input.setAttribute("value", "")
                        input.setAttribute("onchange", "uploadImageArea(this)")
                        input.setAttribute("style", "display: none;")
                        form.appendChild(input)

                        let $return = JSON.parse(httpRequest.responseText)

                        let DIV_0 = document.createElement("div")
                        DIV_0.setAttribute("style", "display: flex;max-height: 500px;")

                        let DIV_IMG = document.createElement("div")
                        let DIV_IMG_SHOW = document.createElement("div")

                        DIV_IMG_SHOW.setAttribute("style", "width: 50%;padding: 20px;")
                        DIV_IMG_SHOW.setAttribute("id", "imageShowArea")

                        DIV_0.appendChild(DIV_IMG)

                        DIV_IMG.setAttribute("id", "ImagesArea")
                        DIV_IMG.setAttribute("style", "width:50%;overflow-y: scroll;border: 1px solid #ccc;padding: 20px;")
                        $return.forEach(function (img) {

                            let imgDiv = document.createElement("img")
                            imgDiv.setAttribute("data-images", img)
                            imgDiv.setAttribute("src", "/" + img)
                            imgDiv.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                            imgDiv.setAttribute("onclick", "showImageArea(this)")
                            DIV_IMG.appendChild(imgDiv)
                        })
                        let button_set = document.createElement("button")
                        let button_set_text = document.createTextNode("Upload Image")
                        button_set.setAttribute("class","btn btn-outline-info")
                        button_set.setAttribute("style","margin:10px auto;display: block;")
                        button_set.setAttribute("onclick","uploadImageClickArea()")
                        button_set.append(button_set_text)

                        DIV_0.appendChild(DIV_IMG)
                        DIV_0.appendChild(DIV_IMG_SHOW)
                        div.appendChild(DIV_0)
                        div.appendChild(button_set)
                        div.appendChild(form)
                    }
                    $('.select2').select2();
                } else
                    message('error','There was a problem with the request.')
            }
        }
    },
}
function showImageArea(e)
{
    let img = document.createElement("img")
    let div = document.createElement("div")
    div.setAttribute("style","display: flex;justify-content: center;flex-wrap: wrap;border:1px black dotted;padding:10px")



    let button_del = document.createElement("button")
    let button_del_text = document.createTextNode("Delete")
    button_del.setAttribute("class","btn btn-outline-danger")
    button_del.setAttribute("onclick","deleteFromFormAreaImage('"+e.getAttribute("data-images")+"')")
    button_del.append(button_del_text)

    // div.appendChild(button_set)
    div.appendChild(button_del)

    let p = document.createElement("p")
    let p_text = document.createTextNode(e.getAttribute("data-images").replace(/web\/form\/images\//gm,''))

    p.append(p_text)
    img.setAttribute("src",e.src)

    document.getElementById("imageShowArea").innerHTML = ""
    document.getElementById("imageShowArea").appendChild(img)
    document.getElementById("imageShowArea").appendChild(p)
    document.getElementById("imageShowArea").appendChild(div)

    let divArea = document.querySelector(".modal.note-modal.show")
    divArea.querySelector("input[type='text']").value = e.src
    divArea.querySelector("input[type='button']").removeAttribute("disabled")
}
function multiFile()
{
    var tableRows = document.getElementById('fileContent');
    var countRows = tableRows.rows.length;
    var tr = document.createElement('tr');
    var td1 = document.createElement('td');
        td1.setAttribute('style','padding-left:25px;');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var numberText = document.createTextNode(countRows);

    var fileInputs = document.createElement('input');
        fileInputs.setAttribute('type','file');
        fileInputs.setAttribute('name','fileInputs[]');
        fileInputs.setAttribute('style','display:none');
        fileInputs.setAttribute('onchange','detailsFile(this)');
        fileInputs.setAttribute('value','');
        td1.appendChild(numberText);

    td2.appendChild(fileInputs);
    var aDelete = document.createElement('a');
        aDelete.setAttribute('class','btn btn-block btn-danger btn-xs');
        aDelete.setAttribute('onclick','deleteTableRow(this)');
    var aText = document.createTextNode('Delete');
        aDelete.appendChild(aText);
        td4.appendChild(aDelete);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tableRows.appendChild(tr);
    //Click
    var inputFiles = document.getElementById('filesContent').elements['fileInputs[]'];
    if(countRows==1)
    {
        inputFiles.click();
    }
    else
    {
        inputFiles[countRows-1].click();
    }
}
function detailsFile(el)
{
    var fileName = document.createTextNode(el.files.item(0).name);
    var fileSize = document.createTextNode(el.files.item(0).size+" bayt");
    var matches = el.parentElement.parentElement;
        matches.getElementsByTagName('td')[1].appendChild(fileName);
        matches.getElementsByTagName('td')[2].appendChild(fileSize);
    //           ajax file upload
    //file
    var inputFiles = document.getElementById('filesContent').elements['fileInputs[]'];
    if(inputFiles.length>1){
        inputFiles = inputFiles[inputFiles.length-1].files[0];
}else
    inputFiles = inputFiles.files[0];

        ajax.fileUpload(inputFiles,el);
}
function deleteTableRow(e)
{
    e.parentNode.parentNode.remove()
}
var input = document.getElementById("emailAddInput")
if(input.value.indexOf("@"))
    input.addEventListener("keyup", function(event) {

    if (event.keyCode === 13 && input.value.indexOf("@")!=-1)
    {
        let a = document.createElement("a")
            a.setAttribute("class","btn btn-outline-dark btn-sm")
            a.setAttribute("data-email",input.value)
            a.setAttribute("style","margin-right:5px; display:flex; align-items: center;margin-bottom:10px;")
        let aX = document.createTextNode(input.value+" ")
            a.append(aX)
        let Input = document.createElement("input")
            Input.setAttribute("class","form-control")
            Input.setAttribute("style","margin:0px 10px;")
            Input.setAttribute("type","text")
            Input.setAttribute("placeholder","Enter name...")

        let span = document.createElement("span")
            span.setAttribute("class","select2-selection__choice__remove")
            span.setAttribute("onclick","removeEmail(this)")
            span.setAttribute("style","color: red;font-weight: bold;font-size:25px;")
            span.setAttribute("role","presentation")
        let spanX = document.createTextNode("×")
            span.appendChild(spanX)
            a.appendChild(Input)
            a.appendChild(span)
        document.getElementById("emailContent").appendChild(a)
        input.value = ""
    }
})
function removeEmail(e)
{
    e.parentNode.remove()
}
function message(type,message)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if(type=='success'){
        Toast.fire({
            icon: 'success',
            title: message
        })
    }else if(type=='error'){
        Toast.fire({
            icon: 'error',
            title: message
        })
    }
}
let sendData = {
    files:[],
    user:[],
    email:[],
    subject:"",
    message:"",
}
function sendAjax()
{
    message("success","Start to sending")
    //  Start
    sendData.files = []
    sendData.user = []
    sendData.email = []
    sendData.subject = ""
    sendData.message = ""

        let files = document.getElementById("filesContent").querySelectorAll("input[type='file']")
            files.forEach(function (input) {
                sendData.files.push(input.getAttribute("data-input"))
            })
        let datas = document.getElementById("emailContent").querySelectorAll("a")
            datas.forEach(function (info) {
                let nameUser = info.querySelector("input[type='text']").value
                let email = info.getAttribute("data-email")
                    sendData.user.push(nameUser)
                    sendData.email.push(email)
            })
        let Subject = document.querySelector("input[name='subject']").value
            sendData.subject = Subject

        let messageG = $("#summernote").summernote('code');
            sendData.message = messageG
            sendData.files = JSON.stringify(sendData.files)
//      remove span element
            document.querySelectorAll("span[role=\"presentation\"]").forEach(function (span) {
                span.remove()
            })
//  End
    recSender(sendData,0)
}
//num=1
function recSender(data,num)
{
//  start
     let Data = {
             files: data.files,
             user:data['user'][num],
             email:data['email'][num],
             subject:data.subject,
             message:data.message,
        }
//  end
    if(num<data.email.length){
        ajax.Sending(Data)
        document.querySelector("a[data-number='"+num+"']").className = "btn btn-outline-info btn-sm"
        num++

        setTimeout(function () {
            return recSender(sendData,num)
        },1000)

    }else{
        message("success","Finished to send")
        location.href = "/admin/message-history"
    }
}
let id = 0;
function addWithEmail()
{

    var input = document.getElementById("emailAddInput")
    if(input.value!="") {
        let a = document.createElement("a")
        a.setAttribute("class", "btn btn-outline-dark btn-sm")
        a.setAttribute("data-email", input.value)
        a.setAttribute("data-number", id)
        a.setAttribute("style", "margin-right:5px; display:flex; align-items: center;margin-bottom:10px;")

        let aX = document.createTextNode(input.value + " ")
        a.append(aX)

        let Input = document.createElement("input")
        Input.setAttribute("class", "form-control")
        Input.setAttribute("style", "margin:0px 10px;")
        Input.setAttribute("type", "text")
        Input.setAttribute("placeholder", "Enter name...")

        let span = document.createElement("span")
        span.setAttribute("class", "select2-selection__choice__remove")
        span.setAttribute("onclick", "removeEmail(this)")
        span.setAttribute("style", "color: red;font-weight: bold;font-size:25px;")
        span.setAttribute("role", "presentation")

        let spanX = document.createTextNode("×")
        span.appendChild(spanX)
        a.appendChild(Input)
        a.appendChild(span)
        document.getElementById("emailContent").appendChild(a)
        input.value = ""
        id++
    }
}
function showFiles()
{
    ajax.filesShow(document.getElementById("div_file"))
}
function showFileArea(e)
{
    let img = document.createElement("img")
    let div = document.createElement("div")
        div.setAttribute("style","display: flex;justify-content: space-between;flex-wrap: wrap;border:1px black dotted;padding:10px")

    let button_set = document.createElement("button")
    let button_set_text = document.createTextNode("Past")
        button_set.setAttribute("class","btn btn-outline-info")
        button_set.setAttribute("onclick","pasteFile('"+e.getAttribute('data-files')+"')")
        button_set.append(button_set_text)

    let button_show = document.createElement("a")
    let button_show_text = document.createTextNode("Show")
        button_show.setAttribute("class","btn btn-outline-dark")
        button_show.setAttribute("target","_blank")
        button_show.setAttribute("href","/"+e.getAttribute('data-files'))
        button_show.append(button_show_text)

    let button_del = document.createElement("button")
    let button_del_text = document.createTextNode("Delete")
        button_del.setAttribute("class","btn btn-outline-danger")
        button_del.setAttribute("onclick","deleteFromFormAreaFile('"+e.getAttribute('data-files')+"')")
        button_del.append(button_del_text)

        div.appendChild(button_set)
        div.appendChild(button_show)
        div.appendChild(button_del)

    let p = document.createElement("p")
    let p_text = document.createTextNode(e.getAttribute("data-files").replace(/web\/uploads\//gm,''))

    p.append(p_text)
    img.setAttribute("src","/web/assets/images/file.png")

    document.getElementById("fileShowArea").innerHTML = ""
    document.getElementById("fileShowArea").appendChild(img)
    document.getElementById("fileShowArea").appendChild(p)
    document.getElementById("fileShowArea").appendChild(div)
}
function pasteFile(e)
{
     ajax.fileInsert(e)
}
function deleteFromFormAreaFile(img)
{
    ajax.deleteFormFileArea(img)
}
function searchingFile(el)
{
    el = el.parentNode.querySelector("input")
    let search = el.value
    let searchDiv = el.parentNode.parentNode.querySelector(".modal-body>div")
    searchDiv.querySelectorAll("div").forEach(function (div) {
        if(search.replace(/\s+/,"")){
            if(div.querySelector("span")) {
                let text = div.querySelector("span").textContent
                if(!div.id)
                    if (text.toUpperCase().match(search.toUpperCase())) {
                        div.style.display = "block"
                    }else{
                            div.style.display = "none"
                    }
            }
            }
        else if(search.replace(/\s+/,"")===""){
            div.querySelectorAll("div").forEach(function (DIV) {
                DIV.style.display = "block"
            })
            el.value = ""
        }
    })

}
function Search(el)
{
    if(!el.value.replace(/\s+/,""))
        document.querySelector("#div_file>div").querySelectorAll("div").forEach(function (div) {
            if(!div.id)
                div.style.display = "block"
        })
}
function uploadImageClickArea(e) {
    document.getElementById("fileUploadAreaImage").click()
}

function uploadVideoClickArea(e) {
    document.getElementById("fileUploadAreaVideo").click()
}