let FORM_ID
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
        },

    });
})
moving()
function moving()
{
    var draggables = document.querySelectorAll('.draggable')
    var containers = document.querySelectorAll('.workPlace')

    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', () => {
            draggable.classList.add('dragging')
        })

        draggable.addEventListener('dragend', () => {
            draggable.classList.remove('dragging')
        })
    })

    containers.forEach(container => {
        container.addEventListener('dragover', e => {
            e.preventDefault()
            const afterElement = getDragAfterElement(container,e.clientX)
            const draggable = document.querySelector('.dragging')

            if (afterElement == null) {
                container.appendChild(draggable)
            } else {
                container.insertBefore(draggable, afterElement)
            }
        })
    })
    $('.select2').select2();
}
function getDragAfterElement(container, x)
{
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect()
        const offset = x - box.left - box.width
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child }
        } else {
            return closest
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element
}
//Verical
movingV()
function movingV()
{
    var draggables = document.querySelectorAll('.draggableV')
    var containers = document.querySelectorAll('.workPlaceV')

    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', () => {
            draggable.classList.add('dragging')
        })

        draggable.addEventListener('dragend', () => {
            draggable.classList.remove('dragging')
        })
    })

    containers.forEach(container => {
        container.addEventListener('dragover', e => {
            e.preventDefault()
            const afterElement = getDragAfterElementV(container, e.clientY)
            const draggable = document.querySelector('.dragging')
            if (afterElement == null) {
                container.appendChild(draggable)
            } else {
                container.insertBefore(draggable, afterElement)
            }
        })
    })
    $('.select2').select2();
}
function getDragAfterElementV(container, y)
{
    const draggableElements = [...container.querySelectorAll('.draggableV:not(.dragging)')]

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect()
        const offset = y - box.top - box.height / 2
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child }
        } else {
            return closest
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element
}
let DivId = Math.floor(Math.random() * 1000),
Block = {
    divBlog:"",
    innerType:false
}
    Block.divBlog= document.querySelector("div.paste")
    Block.innerType = false
document.getElementById("addBlog").onclick = function (e)
{
    DivId = Math.floor(Math.random() * 1000)
    let div0 = document.createElement("div")
        div0.setAttribute("id","block-"+DivId+"-back")
        div0.setAttribute("class","blocks")


    let div = document.createElement("div")
        div.setAttribute("class","paste workPlace")
        div.setAttribute("id","block-"+DivId)
        div0.appendChild(div)
    if(!document.getElementById("pasteBlog")){
        let DiV = document.createElement("div");
            DiV.setAttribute("id","pasteBlog")

        document.querySelector("#myTopnav").insertAfter(DiV)
    }

    document.getElementById("pasteBlog").appendChild(div0)
    moving()


//    step 2
    document.querySelectorAll("div.paste").forEach(function (el) {
        el.onclick = function () {
            document.getElementById("summernoteDiv").style.display="none"
            Block.divBlog = el
            Block.innerType = false
            setSetting(el.id)
            document.getElementById("styleBlock").style.display="block"
            document.getElementById("flexBlog").style.display="flex"
            message("success","Successfully select!")
        }
    })
    nullAble("blog")
    document.querySelectorAll("div.sub").forEach(function (el) {
        el.onclick = function () {
            setTimeout(function (){
                Block.divBlog = el
                Block.innerType = true
                setSetting(el.id)
                document.getElementById("styleBlock").style.display="block"
                document.getElementById("flexBlog").style.display="none"
            },500)
            message("success","Successfully select!")
        }
    })
    Block.divBlog = document.getElementById("block-"+DivId)

}
document.getElementById("addPage").onclick = function (e)
{
    ajax.createNewPage()
}
document.getElementById("addElement").onclick = function (e)
{
    let DIV
    if(!Block.divBlog)
        message("error","Please select or add block!")

    if(Block.divBlog.className!="paste workPlace")
         DIV = Block.divBlog.parentNode.parentNode
    else
        DIV = Block.divBlog

        let Div = Math.floor(Math.random() * 1000)
        let div = document.createElement("div")
            div.setAttribute("class", "paste-inner draggable")
            div.setAttribute("draggable", "true")
            div.setAttribute("id", "element-" + Div + "-back")
        let div2 = document.createElement("div")
            div2.setAttribute("id", "element-" + Div)
            div2.setAttribute("class", "sub")
        let div2_p = document.createElement("p")
        let div2_pX = document.createTextNode("example text")
            div2_p.appendChild(div2_pX)
            div2.appendChild(div2_p)
            div.appendChild(div2)
            DIV.appendChild(div)
            moving()
        document.querySelectorAll("div.sub").forEach(function (el) {
            el.onclick = function () {
                setTimeout(function (){
                    Block.divBlog = el
                    Block.innerType = true
                    document.getElementById("flexBlog").style.display="none"
                    document.getElementById("summernoteDiv").style.display="block"
                    el.querySelectorAll('*').forEach(function (content) {
                        content.setAttribute("contenteditable","true")
                    })
                    setSetting(el.id)
                    $("#summernote").summernote('code',el.innerHTML);
                },500)
                message("success", "Successfully select!")
            }
        })

}
Element.prototype.insertAfter = function(new1) {
    this.parentNode.insertBefore(new1, this.nextSibling);
}


function selectElement(el)
{
    setTimeout(function (){
        Block.divBlog = el
        Block.innerType = true
        setSetting(el.id)
        document.getElementById("flexBlog").style.display="none"
        document.getElementById("styleBlock").style.display="block"
        document.getElementById("summernoteDiv").style.display="block"
        $("#summernote").summernote('code',el.innerHTML);
    },500)

    message("success","Successfully select!")
}
var ajax = {
    ajaxMethod:'POST',
    deleteFormImage:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/delete-form-image/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText!='error')
                        document.querySelectorAll("img[data-images='"+httpRequest.responseText+"']").forEach(function (div) {
                            div.remove()
                        })
                    document.getElementById("imageShow").innerHTML = ""
                    message("success","Delete successfully image")
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    deleteFormImageArea:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/delete-form-image/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText!='error')
                        document.querySelectorAll("img[data-images='"+httpRequest.responseText+"']").forEach(function (div) {
                            div.remove()
                        })
                    document.getElementById("imageShowArea").innerHTML = ""
                    message("success","Delete successfully image")
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    deleteFormVideoArea:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/delete-form-video/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText!='error')
                    document.querySelector("video[data-videos='"+httpRequest.responseText+"']").remove()
                    document.getElementById("videosShowArea").innerHTML = ""
                    message("success","Delete successfully video")
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    saveAll:function (template,menu,id,url) {
        var formData = new FormData()
        formData.append('template', template)
        formData.append('menu', menu)
        formData.append('id', id)
        formData.append('url', url)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/save-template/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    message("success","Save successfully")
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    createNewPage:function () {

//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/new-template/')
        httpRequest.send();

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let id = httpRequest.responseText
                    let a = document.createElement("a")
                        a.setAttribute("class","btn btn-outline-info btn-sm")
                        a.setAttribute("onclick","ajax.selectTemplate(this)")
                    let aX = document.createTextNode("Page id: "+id)
                    let span = document.createElement("span")
                        span.setAttribute("style","color: red;font-weight: bold; margin-left: 10px;font-size: 20px;")
                        span.setAttribute("data-id",id)
                        span.setAttribute("onclick","ajax.deletePage(this)")
                    let spanX = document.createTextNode("x")
                        span.appendChild(spanX)
                        a.appendChild(aX)
                        a.appendChild(span)
                    document.getElementById("pages").append(a)
                    FORM_ID = id

                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    deletePage:function (el) {
    let id = el.getAttribute("data-id")
    var formData = new FormData()
        if(confirm("Are you sure delete this template!")===false)
            return;
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/delete-template/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText===1)
                        message('error',"Successfully delete page!")
                        location.reload()
                    if(id===FORM_ID)
                        FORM_ID = null
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    selectTemplate:function (el) {
        nullAble('blog')
        nullAble('body')
        let id = el.querySelector("span").getAttribute("data-id")
        let formData = new FormData()
//      ajax method without jquery
        let httpRequest = new XMLHttpRequest()
            formData.append('id', id)
            httpRequest.open(this.ajaxMethod, '/select-template/')
            httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let result =  JSON.parse(httpRequest.responseText)
                        FORM_ID = result[0].id


                    if(!result[0].template)
                        result[0].template = "<div id='pasteBlog' data-style-read=\"#backTemplate::after [#] #backTemplate::before [#] \" data-style-code=\"content: '';background-color:rgba(0, 0, 0, 0);position: fixed;z-index: -1;width: 100%;height: 100%;top: 0;left: 0;\n" +
                            " [#] background-image:url(''); background-repeat: no-repeat;background-size: cover;content: '';position: fixed;top: 0;left: 0;z-index: -9;width: 100%;height: 100%;filter:blur(0px);\n" +
                            "\n" +
                            " [#] \"></div>"

                        document.getElementById("styleBlock").style.display = "none"
                        if(document.querySelector("#pasteBlog"))
                            document.querySelector("#pasteBlog").remove()
                            document.querySelector("#template").prepend( stringToHTML(result[0].template).querySelector("div"))
                        if(document.querySelector("#myTopnav"))
                            document.querySelector("#myTopnav").remove()
                            document.querySelector("#template").prepend( stringToHTML(result[1].menu).querySelector("div"))
                            document.querySelector("#pageUrl").value = result[0].url
                        setStyleTag()
                        setOnClicks()
                        readStyleBody()

                        message('success','Select page of '+FORM_ID)
                        document.getElementById("pages").querySelectorAll('a').forEach(function (a) {
                            a.setAttribute("class","btn btn-outline-info btn-sm")
                        })
                        el.className = 'btn btn-outline-success btn-sm'
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
    videosShow:function(div) {
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/videos-show/')
        httpRequest.send();

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(!document.querySelector("div#videosShowArea")) {

                        let form = document.createElement("form")
                        form.setAttribute("method", "POST")
                        form.setAttribute("enctype", "multipart/form-data")
                        form.setAttribute("style", "display: none;")
                        let input = document.createElement("input")
                        input.setAttribute("type", "file")
                        input.setAttribute("id", "fileUploadAreaVideo")
                        input.setAttribute("name", "file")
                        input.setAttribute("value", "")
                        input.setAttribute("onchange", "uploadVideoArea(this)")
                        input.setAttribute("style", "display: none;")
                        form.appendChild(input)

                        let $return = JSON.parse(httpRequest.responseText)
                        let DIV_0 = document.createElement("div")
                        DIV_0.setAttribute("style", "display: flex;max-height: 500px;")

                        let DIV_VIDEO = document.createElement("div")
                        let DIV_VIDEO_SHOW = document.createElement("div")

                        DIV_VIDEO_SHOW.setAttribute("style", "width: 50%;padding: 20px;")
                        DIV_VIDEO_SHOW.setAttribute("id", "videosShowArea")

                        DIV_0.appendChild(DIV_VIDEO)

                        DIV_VIDEO.setAttribute("id", "VideosArea")
                        DIV_VIDEO.setAttribute("style", "width:50%;overflow-y: scroll;border: 1px solid #ccc;padding: 20px;")

                        $return.forEach(function (video) {

                            let videoDiv = document.createElement("video")
                            videoDiv.setAttribute("data-videos", video)
                            videoDiv.setAttribute("src", "/" + video)
                            videoDiv.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                            videoDiv.setAttribute("onclick", "showVideoArea(this)")
                            DIV_VIDEO.appendChild(videoDiv)
                        })
                        let button_set = document.createElement("button")
                        let button_set_text = document.createTextNode("Upload Video")
                        button_set.setAttribute("class","btn btn-outline-info")
                        button_set.setAttribute("style","margin:10px auto;display: block;")
                        button_set.setAttribute("onclick","uploadVideoClickArea()")
                        button_set.append(button_set_text)

                        DIV_0.appendChild(DIV_VIDEO)
                        DIV_0.appendChild(DIV_VIDEO_SHOW)
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
    ImageUpload:function (file){
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
                        img.setAttribute("onclick","showImage(this)")
                        document.getElementById("Images").appendChild(img)

                        if (document.getElementById("ImagesArea")){
                            let img2 = img.cloneNode(true)
                            document.getElementById("ImagesArea").appendChild(img2)
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
    VideoUploadArea:function (file){
        var formData = new FormData()
        formData.append('file', file)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/upload-form-video/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function(){
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText.indexOf("error:")==-1)
                    {
                        let video = document.createElement('video')
                        video.setAttribute("style","width: 100px;cursor: pointer;margin: 5px;")
                        video.setAttribute("src","/web/form/videos/"+httpRequest.responseText)
                        video.setAttribute("data-videos","web/form/videos/"+httpRequest.responseText)
                        video.setAttribute("onclick","showVideoArea(this)")
                        document.getElementById("VideosArea").appendChild(video)
                        message("success","Video successfully upload")
                    }else
                        message("error",httpRequest.responseText.replace(/error:/,""))
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    }
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
function menu() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function showSetting()
{
    let Settings = document.getElementById("Settings").style.display

    if(Settings=="none"){
        document.getElementById("Settings").style.display = 'block'
        message('success',"Successfully show settings!")
    }else{
        document.getElementById("Settings").style.display = 'none'
        message('success',"Successfully hide settings!")
    }

}
function settingTemplateHide(el)
{
    let Settings = document.getElementById("advanced").style.display

    if(Settings=="none") {
        el.innerHTML = "Hide template settings"
        document.getElementById("advanced").style.display = 'block'

        el.style.backgroundColor = "black"
        el.style.color = "white"
        document.getElementById("settingMenu").innerHTML = "Show menu settings"
        document.getElementById("settingMenu").style.backgroundColor="white"
        document.getElementById("settingMenu").style.color="black"
        document.getElementById("advancedMenu").style.display = 'none'
    }else{
        el.innerHTML = "Show template settings"
        document.getElementById("advanced").style.display = 'none'
        el.style.backgroundColor = "white"
        el.style.color = "black"
    }
    setMenuFromTemplate("menu-list")
}
function settingMenuHide(el)
{
    let Settings = document.getElementById("advancedMenu").style.display
    if(Settings=="none") {
        el.innerHTML = "Hide menu settings"
        document.getElementById("advancedMenu").style.display = 'block'
        el.style.backgroundColor = "black"
        el.style.color = "white"

        document.getElementById("settingTemplate").innerHTML = "Show template settings"
        document.getElementById("settingTemplate").style.backgroundColor = "white"
        document.getElementById("settingTemplate").style.color = "black"

        document.getElementById("advanced").style.display = 'none'
    }else{
        el.innerHTML = "Show menu settings"
        document.getElementById("advancedMenu").style.display = 'none'
        el.style.backgroundColor = "white"
        el.style.color = "black"
    }
}
var styleManager = (function()
{
    // Create the <style> tag
    var style = document.createElement("style")

    // WebKit hack
    style.appendChild(document.createTextNode(""));

    // Add the <style> element to the page
    document.head.appendChild(style);

    function getStyleRuleIndexBySelector(selector, prop){
        var result = [], i,
            value = (prop ? selector + "{" + prop + "}" : selector).replace(/\s/g, ''), // remove whitespaces
            s = prop ? "cssText" : "selectorText";

        for( i=0; i < style.sheet.cssRules.length; i++ )
            if( style.sheet.cssRules[i][s].replace(/\s/g, '') == value)
                result.push(i);

        return result;
    };

    return {
        style : style,

        getStyleRuleIndexBySelector : getStyleRuleIndexBySelector,

        add(prop, value){
            return style.sheet.insertRule(`${prop}{${value}}`, style.sheet.cssRules.length);
        },

        remove(selector, prop){
            var indexes = getStyleRuleIndexBySelector(selector, prop), i = indexes.length;
            // reversed iteration so indexes won't change after deletion for each iteration
            for( ; i-- ; )
                style.sheet.deleteRule( indexes[i] );
        }
    }
})();
function addMenu(name=null,href=null, status=null,id=null)
{

    let menuName = document.querySelector("input[name='menuName']").value
        if(name!=null)
            menuName=name

    let menuHref = document.querySelector("input[name='menuHref']").value
        if(menuHref!=null)
            menuHref=href

    if(!menuName) return


    let divMenu = document.createElement("div")
        divMenu.setAttribute("class","divMenu")

    let menuHead = document.createElement("div")
        menuHead.setAttribute("class","workPlaceV menuHead")

    let menu = document.createElement("a")
        menu.setAttribute("class","btn btn-info draggableV menu")
    if(id==null)
        menu.setAttribute("draggable","true")

        menu.setAttribute("style","cursor: move")
        menu.setAttribute("data-link",menuHref)
    if (id!=null)
        menu.setAttribute("onclick","updateMenuInfo(this,'"+id+"')")
    else
        menu.setAttribute("onclick","updateMenuInfo(this)")

    let menuX = document.createTextNode(menuName)
        menu.append(menuX)

    let menuSub = document.createElement("div")
        menuSub.setAttribute("class","workPlaceV menuSub")
    if (id!=null)
        menuSub.setAttribute("onclick","updateMenuInfoCLick(this,'"+id+"')")
    else
        menuSub.setAttribute("onclick","updateMenuInfoCLick(this)")

        divMenu.appendChild(menuHead)

    if(status==null)
        menuHead.appendChild(menu)
    else
        menuSub.appendChild(menu)

        divMenu.appendChild(menuSub)
    if(id==null)
        document.getElementById("menuDiv").appendChild(divMenu)
    else
        document.getElementById(id).appendChild(divMenu)


    document.querySelector("input[name='menuName']").value = ""
    document.querySelector("input[name='menuHref']").value = ""
    movingV()
}
function createMenu()
{
    let Menu = {
        name:[],
        status:[],
        href:[],
    }
    document.getElementById("menuDiv").querySelectorAll("a.menu").forEach(function (menu) {
        let checkStatus = menu.parentNode.className

            Menu.name.push(menu.textContent)
            Menu.href.push(menu.getAttribute("data-link"))

        if(checkStatus.match(/menuHead/))
            Menu.status.push("head")
        else if (checkStatus.match(/menuSub/))
            Menu.status.push("sub")
    })
    for (let i = 0;i<Menu.status.length;i++)
    {

        if(Menu.status[i]=='sub')
        {
            if(Menu.status[i-1])
            {
                if (Menu.status[i - 1] != 'sub')
                        Menu.status[i - 1] = "dropdawn"
            }
        }
        //Check
        if(Menu.status.length==1)
        {
            if (Menu.status[0] == 'sub')
                   Menu.status[0] = "head"
        }
        if(Menu.status.length>1)
        {
            if (Menu.status[0] == 'sub') {
                if (Menu.status[1] == "head" || Menu.status[1] == "dropdawn")
                        Menu.status[0] = "head"
                else if (Menu.status[1] == "sub")
                    Menu.status[0] = "dropdawn"
            }
        }
    }
//  Create Menu
    let div = document.getElementById("myTopnav"),dropdawn=""
        div.innerHTML = ""
    for (let i = 0;i<Menu.status.length;i++)
    {
        if(Menu.status[i]=="head"){
            let head = document.createElement("a")
            let headX = document.createTextNode(Menu.name[i])
                head.setAttribute("href",Menu.href[i])
                head.setAttribute("data-link",Menu.href[i])
                if(i==0){
                    head.setAttribute("class","active")
                }
                head.appendChild(headX)
                div.appendChild(head)
        }else if(Menu.status[i]=="dropdawn"){
            let div0 = document.createElement("div")
                div0.setAttribute("class","dropdown")


            let button = document.createElement("button")
                button.setAttribute("class","dropbtn")
            let buttonX = document.createTextNode(Menu.name[i]+" ")
                button.append(buttonX)
            let icon = document.createElement("i")
                icon.setAttribute("class","fa fa-caret-down")
                button.appendChild(icon)
                div0.appendChild(button)

            let div0_1 = document.createElement("div")
                div0_1.setAttribute("class","dropdown-content")

                div0.appendChild(div0_1)
                div.appendChild(div0)
                dropdawn = div0_1
        }else if(Menu.status[i]=="sub") {
            let sub = document.createElement("a")
            let subX = document.createTextNode(Menu.name[i])
                sub.setAttribute("href",Menu.href[i])
                sub.setAttribute("data-link",Menu.href[i])
                sub.append(subX)
                dropdawn.appendChild(sub)
        }
    }
    let lastEl = document.createElement("a")
        lastEl.setAttribute("href","javascript:void(0);")
        lastEl.setAttribute("class","icon")
        lastEl.setAttribute("onclick","menu()")
    let icon =  document.createElement("i")
        icon.setAttribute("class","fa fa-bars")
        lastEl.appendChild(icon)
        div.appendChild(lastEl)
    message("success","Menu construct successfully!")
}
setMenuFromTemplate()
function setMenuFromTemplate(id=null)
{
    if(id!=null)
        document.getElementById(id).innerText=""

    document.querySelectorAll("#myTopnav>*").forEach(function (nav) {
        if(nav.className!="icon")
            if(nav.tagName =="A")
                addMenu(nav.textContent,nav.getAttribute("data-link"),null,id)
            else if(nav.tagName =="DIV"){
                addMenu(nav.querySelector("button").textContent,"",null,id)
                nav.querySelectorAll("a").forEach(function (el) {
                    addMenu(el.textContent,el.getAttribute("data-link"),1,id)
                })
            }

    })
//set Settings
    setMenuSetting()
}
let menuElement
function updateMenuInfo(el,id=null)
{
    let name = el.textContent
    let href = el.getAttribute("data-link")

    if (id==null) {
        document.querySelector("input[name='menuName']").value = name
        document.querySelector("input[name='menuHref']").value = href
        document.getElementById("addMenuButton").style.display = "none"
        document.getElementById("udpateMenu").style.display = "flex"
        menuElement = el
    }else{
        document.getElementById("pageUrl").value = href
    }

}
function updateMenu()
{
    document.getElementById("addMenuButton").style.display = "block"
    document.getElementById("udpateMenu").style.display = "none"

    let name = document.querySelector("input[name='menuName']").value
    let href = document.querySelector("input[name='menuHref']").value
    menuElement.innerHTML = name
    menuElement.setAttribute("data-link",href)

    document.querySelector("input[name='menuName']").value = ""
    document.querySelector("input[name='menuHref']").value = ""

}
function deleteMenuItem()
{
    menuElement.parentNode.parentNode.remove()
    document.querySelector("input[name='menuName']").value = ""
    document.querySelector("input[name='menuHref']").value = ""
    document.getElementById("addMenuButton").style.display = "block"
    document.getElementById("udpateMenu").style.display = "none"
}
function updateMenuInfoCLick(el)
{
    el.parentNode.querySelector("a").click()
}

function hexToRGB(hex, alpha)
{
    var r = parseInt(hex.slice(1, 3), 16),
        g = parseInt(hex.slice(3, 5), 16),
        b = parseInt(hex.slice(5, 7), 16);

    if (alpha) {
        return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
    } else {
        return "rgb(" + r + ", " + g + ", " + b + ")";
    }
}
function setStyle(Style)
{
    let objectStyle = {

        headClass:[
            ".topnav", //Color [Background:, Opacity:]
            ".topnav a", //Color [Text:]
            ".dropdown .dropbtn", //Color [Text:]
            ".topnav a.active",//Active color [Background:, Opacity:, Text:]
            ".dropdown-content",//Dropdown color [Background:, Opacity:]
            ".dropdown-content a",//Dropdown color [Text:]
            ".topnav a:hover,.dropdown:hover .dropbtn",//Hover color [Background:, Text:, Opacity:]
            ".dropdown-content a:hover"//Dropdown hover color [Background:, Opacity:, Text:]
        ],

        styleCss:[
            "overflow: hidden;background-color:;position: sticky;top: 0;width: 100%;z-index: 10;font-size:;font-weight:;font-family:;font-style:;",
            "float: left;display: block;COLOR:;text-align: center;padding: 14px 16px;text-decoration: none;font-size:;",
            "border: none;outline: none;COLOR:;padding: 14px 16px;background-color: inherit;margin: 0;font-size:;font-weight:;font-family:;font-style:;",
            "background-color:;COLOR:;",
            "display: none;position: fixed;background-color:;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 10;",
            "float: none;COLOR:;padding: 12px 16px;text-decoration: none;display: block;text-align: left;",
            "background-color:;COLOR:;",
            "background-color:;COLOR:;"
        ],

        valColors:[
            ['menu-back-color','menu-opacity',"","menu-font-weight","menu-font-family","menu-font-style"],
            ['menu-text-color',"","","menu-font-size"],
            ['menu-text-color',"menu-font-size","menu-font-weight","menu-font-family","menu-font-style"],
            ['menu-active-back-color','menu-active-opacity','menu-active-text-color'],
            ['menu-dropdown-back-color','menu-dropdown-opacity'],
            ['menu-dropdown-text-color'],
            ['menu-hover-back-color','menu-hover-opacity', 'menu-hover-text-color'],
            ['menu-dropdown-hover-back-color','menu-dropdown-hover-opacity', 'menu-dropdown-hover-text-color']
        ]

    }
    let copyObject = objectStyle,setStyleValue="",readHead="",readCode="";
    objectStyle.headClass.forEach(function (Class) {
        //id
        let keyId = copyObject['headClass'].indexOf(Class)
        let style_Css = copyObject['styleCss'][keyId]
        let input = copyObject['valColors'][keyId]
        let textColorId = "",
            backColorId = "",
            opacityId = "",
            fontSizeId = "",
            fontWeightId = "",
            fontFamilyId = "",
            blurId = "",
            fontStyleId = ""

        let Opacity
        if(input.length==1)
            textColorId = input[0]
        else if(input.length==2) {
            backColorId = input[0]
            opacityId = input[1]
        }
        else if(input.length==3){
            backColorId = input[0]
            opacityId = input[1]
            textColorId = input[2]
        }
        else if(input.length==6){
            backColorId = input[0]
            opacityId = input[1]
            fontWeightId = input[3]
            fontFamilyId = input[4]
            fontStyleId = input[5]
        }
        else if(input.length==5){
            backColorId = input[0]
            fontSizeId = input[1]
            fontWeightId = input[2]
            fontFamilyId = input[3]
            fontStyleId = input[4]
        }
        else if(input.length==4){
            backColorId = input[0]
            fontSizeId = input[3]
        }

        if(opacityId!="")
        {
            let opacity = document.getElementById(opacityId)
                Opacity = opacity.value
                opacity.parentNode.querySelector("span").innerText = Opacity
                setStyleValue += opacityId+"=>"+Opacity+";\n"
        }

        if(textColorId!="")
        {
            let textColor = document.getElementById(textColorId)
            let property1 = textColor.getAttribute("data-property")
            let val1 = textColor.value
                style_Css = style_Css.replace(property1,property1+val1).toLowerCase()+"\n"
                setStyleValue += textColorId+"=>"+val1+";\n"
        }
        if(backColorId!="")
        {
            let backColor = document.getElementById(backColorId)
            let property2 = backColor.getAttribute("data-property")
            let val2 = backColor.value
                setStyleValue += backColorId+"=>"+val2+";\n"
                val2 = hexToRGB(val2,Opacity)
                style_Css = style_Css.replace(property2,property2+val2)+"\n"

        }
//      FONT
        if(fontSizeId!="")
        {
            let fontSize = document.getElementById(fontSizeId)
            let property3 = fontSize.getAttribute("data-property")
            let val3 = fontSize.value+"px"
                style_Css = style_Css.replace(property3,property3+val3).toLowerCase()+"\n"
                setStyleValue += fontSizeId+"=>"+val3+";\n"
        }
        if(fontWeightId!="")
        {
            let fontWeight = document.getElementById(fontWeightId)
            let property4 = fontWeight.getAttribute("data-property")
            let val4 = fontWeight.value
                style_Css = style_Css.replace(property4,property4+val4).toLowerCase()+"\n"
                setStyleValue += fontWeightId+"=>"+val4+";\n"
        }
        if(fontFamilyId!="")
        {
            let fontFamily = document.getElementById(fontFamilyId)
            let property5 = fontFamily.getAttribute("data-property")
            let val5 = fontFamily.value
                style_Css = style_Css.replace(property5,property5+val5).toLowerCase()+"\n"
                setStyleValue += fontFamilyId+"=>"+val5+";\n"
        }
        if(fontStyleId!="")
        {
            let fontStyle = document.getElementById(fontStyleId)
            let property5 = fontStyle.getAttribute("data-property")
            let val5 = fontStyle.value
                style_Css = style_Css.replace(property5,property5+val5).toLowerCase()+"\n"
                setStyleValue += fontStyleId+"=>"+val5+";\n"
        }
        styleManager.add(Class,style_Css);
        readHead+= Class+" [#] "
        readCode+= style_Css+" [#] "
    })
    document.getElementById("myTopnav").setAttribute("data-style",setStyleValue)
    document.getElementById("myTopnav").setAttribute("data-style-read",readHead)
    document.getElementById("myTopnav").setAttribute("data-style-code",readCode)
}
function setStyleBody(Style)
{
    let objectStyle = {

        headClass:[
            "#backTemplate::after", // back-color, opacity
            "#backTemplate::before", //back-image, blur
        ],

        styleCss:[
            "content: '';background-color:;position: fixed;z-index: -1;width: 100%;height: 100%;top: 0;left: 0;",
            "background-image:; background-repeat: no-repeat;background-size: cover;content: '';position: fixed;top: 0;left: 0;z-index: -9;width: 100%;height: 100%;filter:;"
        ],

        valColors:[
            ['body-back-color','body-opacity'],
            ['selectBodyImage',"body-blur"],
        ]

    }
    let copyObject = objectStyle,setStyleValue="",readHead="",readCode="";
    objectStyle.headClass.forEach(function (Class) {
        //id
        let keyId = copyObject['headClass'].indexOf(Class)
        let style_Css = copyObject['styleCss'][keyId]
        let input = copyObject['valColors'][keyId]

        let backColorId = "",
            opacityId = "",
            backImageId = "",
            backBlurId = ""

        let Opacity
        if(keyId==0) {
            backColorId = input[0]
            opacityId = input[1]

        }
        else if(keyId==1){
            backImageId = input[0]
            backBlurId = input[1]
        }
        //Opacity
        if(opacityId!="")
        {
            let opacity = document.getElementById(opacityId)
            Opacity = opacity.value
            opacity.parentNode.querySelector("span").innerText = Opacity
            setStyleValue += opacityId+"=>"+Opacity+";"
        }
        //
        if(backColorId!="")
        {
            let backColor = document.getElementById(backColorId)
            let property = backColor.getAttribute("data-property")
            let val = backColor.value
            setStyleValue += backColorId+"=>"+val+";"
            val = hexToRGB(val,Opacity)
            style_Css = style_Css.replace(property,property+val)+"\n"
        }
        if(backImageId!="")
        {
            let backImage = document.getElementById(backImageId)
            let property = backImage.getAttribute("data-property")
            let val = backImage.src
                setStyleValue += backImageId+"=>"+val+";"
                style_Css = style_Css.replace(property,property+"url('"+val+"')")+"\n"
        }
        //Blur
        if(backBlurId!="")
        {
            let blur = document.getElementById(backBlurId)
            let val = blur.value
            let bluring = "filter:blur("+blur.value+"px)"
            let property = blur.getAttribute("data-property")
            style_Css = style_Css.replace(property,bluring)+"\n"
            setStyleValue += backBlurId+"=>"+val+";"
        }
        //
        styleManager.add(Class,style_Css);
        readHead+= Class+" [#] "
        readCode+= style_Css+" [#] "
    })
    if(!document.getElementById("pasteBlog"))
        return
    document.getElementById("pasteBlog").setAttribute("data-style",setStyleValue)
    document.getElementById("pasteBlog").setAttribute("data-style-read",readHead)
    document.getElementById("pasteBlog").setAttribute("data-style-code",readCode)
}
let blockId = "block-2000"
function styleSetBlock(block)
{
    Block.divBlog = block
    blockId = block.id
    setSetting(blockId)
    message("success","Selected successfully!")
    document.getElementById("flexBlog").style.display="flex"
    document.getElementById("styleBlock").style.display="block"
    document.getElementById("summernoteDiv").style.display="none"
}
function setStyleBlock(Style)
{
    let Styles = {
        blockClass:[
            //.value
            ".block-flex",
            ".block-back-color",// opacity id = block-back-opacity
            ".block-text-color",
            ".block-padding",
            ".block-blur",
            ".border-radius",
        ],
        blockClassHover:[
            //Value
            ".block-hover-back-color",//opacity id = block-hover-opacity
            ".block-hover-text-color",
            ".block-hover-blur"
        ],
        blockClassBack:[
            //src
            ".block-back-img",
            ".block-back-width",//id = block-width-ext
            ".border-radius",
        ]
    }
    let style="",styleBack="",styleHover="",codeStyles="",readHead="",readCode=""
    //daTa-hidden=['flex']
    //setSetting
    Styles.blockClass.forEach(function (cl) {
        document.querySelectorAll(cl).forEach(function (input) {
            if(cl==".block-back-color") {
                style += input.getAttribute("data-property") + hexToRGB(input.value, document.getElementById("block-back-opacity").value) + ";  transition: 0.5s;";
                codeStyles += "#block-back-opacity" + "=>" + document.getElementById("block-back-opacity").value+";"
                document.getElementById("block-back-opacity").parentNode.querySelector("span").innerHTML = document.getElementById("block-back-opacity").value
                codeStyles += cl+"=>"+input.value+";"
            }

            if(cl==".block-flex")
                if(input.checked==true){
                    codeStyles += cl+"=>"+input.value+";"
                    style +=input.getAttribute("data-property")+input.value+";";
                }

            if(cl==".block-text-color"){
                codeStyles += cl+"=>"+input.value+";"
                style +=input.getAttribute("data-property")+input.value+";";
            }
            if(cl==".block-padding"){
                codeStyles += cl+"=>"+input.value+";"
                style +=input.getAttribute("data-property")+input.value+"px;";
            }
            if(cl==".block-blur") {
                codeStyles += cl + "=>" + input.value + ";"
                style += input.getAttribute("data-property") + "blur(" + input.value + "px);";
            }
            if(cl==".border-radius") {
                codeStyles += cl+"=>"+input.value+";"
                    style +=input.getAttribute("data-property")+input.value+"px;";

            }
        })
    })
    Styles.blockClassHover.forEach(function (cl) {
        document.querySelectorAll(cl).forEach(function (input) {
            if(cl==".block-hover-back-color"){
                styleHover +=input.getAttribute("data-property")+hexToRGB(input.value,document.getElementById("block-hover-opacity").value)+";";
                codeStyles += "#block-hover-opacity" + "=>" + document.getElementById("block-hover-opacity").value+";"
                document.getElementById("block-hover-opacity").parentNode.querySelector("span").innerHTML = document.getElementById("block-hover-opacity").value
                codeStyles += cl+"=>"+input.value+";"
            }

            if(cl==".block-hover-text-color"){
                codeStyles += cl+"=>"+input.value+";"
                styleHover +=input.getAttribute("data-property")+input.value+";";
            }

            if(cl==".block-hover-blur"){
                codeStyles += cl+"=>"+input.value+";"
                styleHover +=input.getAttribute("data-property")+"blur("+input.value+"px);";
            }

        })
    })
    Styles.blockClassBack.forEach(function (cl) {
        document.querySelectorAll(cl).forEach(function (input) {
            if(cl==".block-back-img") {
                styleBack += input.getAttribute("data-property") + "url(" + input.src + ");"
                codeStyles += cl + "=>" + input.src+";"
            }
            if(cl==".block-back-width"){

                if(Block.divBlog.className!="sub")
                    styleBack += input.getAttribute("data-property") + input.value + document.getElementById("block-width-ext").value + ";";
                else
                    styleBack += input.getAttribute("data-property").replace("margin:0px auto;","") + input.value + document.getElementById("block-width-ext").value + ";";

                codeStyles += "#block-width-ext" + "=>" + document.getElementById("block-width-ext").value+";"
                codeStyles += cl+"=>"+input.value+";"
            }
            if(cl==".border-radius") {
                codeStyles += cl+"=>"+input.value+";"
                styleBack +=input.getAttribute("data-property")+input.value+"px;";
            }

        })
    })

    styleManager.add("#"+Block.divBlog.id,style)
    styleManager.add("#"+Block.divBlog.id+"-back",styleBack)
    styleManager.add("#"+Block.divBlog.id+":hover",styleHover)

    readHead = "#"+Block.divBlog.id+" [#] "+"#"+Block.divBlog.id+"-back"+" [#] "+"#"+Block.divBlog.id+":hover"
    readCode = style+" [#] "+ styleBack +" [#] "+ styleHover
    document.getElementById(Block.divBlog.id).setAttribute("data-style",codeStyles)
    document.getElementById(Block.divBlog.id).setAttribute("data-style-read",readHead)
    document.getElementById(Block.divBlog.id).setAttribute("data-style-code",readCode)

}
let set_image
function setImage(type)
{
    set_image = type
    document.getElementById("imageShow").innerHTML = ""
}
function showImage(e)
{
    let img = document.createElement("img")
    let div = document.createElement("div")
    div.setAttribute("style","display: flex;justify-content: space-between;flex-wrap: wrap;border:1px black dotted;padding:10px")

    let button_set = document.createElement("button")
    let button_set_text = document.createTextNode("Set")
    button_set.setAttribute("class","btn btn-outline-info")
    button_set.setAttribute("onclick","uniSetImage('"+e.getAttribute("data-images")+"','"+set_image+"')")
    button_set.append(button_set_text)

    let button_del = document.createElement("button")
    let button_del_text = document.createTextNode("Delete")
    button_del.setAttribute("class","btn btn-outline-danger")
    button_del.setAttribute("onclick","deleteFromForm('"+e.getAttribute("data-images")+"')")
    button_del.append(button_del_text)

    div.appendChild(button_set)
    div.appendChild(button_del)

    let p = document.createElement("p")
    let p_text = document.createTextNode(e.getAttribute("data-images").replace(/web\/form\/images\//gm,''))

    p.append(p_text)
    img.setAttribute("src",e.src)

    document.getElementById("imageShow").innerHTML = ""
    document.getElementById("imageShow").appendChild(img)
    document.getElementById("imageShow").appendChild(p)
    document.getElementById("imageShow").appendChild(div)
}
function deleteFromForm(img)
{
    ajax.deleteFormImage(img)
}
function uniSetImage(val,type)
{
        document.getElementById("select" + type + "Image").src = "/" + val
        document.getElementById("select" + type + "Image").parentNode.querySelector("span").style.display = "none"
        document.getElementById("select" + type + "Image").style.display = "block"
        let blur = document.getElementById("body-blur").value
    if (type=="Logo"){
        styleManager.add('#myTopnav>a:first-child',
            "background-image: url('/"+val+"');background-repeat:no-repeat;" +
            "min-width:100px;min-height:50px;" +
            "color:rgba(255,255,255,0);" +
            "background-size:100px;50px")
        document.querySelector("#myTopnav>a:first-child").setAttribute("data-logo", val)
    } else if(type=="Body"){
        styleManager.add('#backTemplate::before',
            "background-image: url('/"+val+"');background-repeat:no-repeat;" +
            "background-size: cover;"+
            "content: '';"+
            "position: fixed;"+
            "top: 0;"+
            "left: 0;"+
            "z-index: -9;"+
            "width: 100%;"+
            "height: 100%;"+
            "  -webkit-filter: blur("+blur+"px);" +
            "  -moz-filter: blur("+blur+"px);" +
            "  -o-filter: blur("+blur+"px);" +
            "  -ms-filter: blur("+blur+"px);" +
            "  filter: blur("+blur+"px);");
        setStyleBody()
    }else if(type=="Block"){
        setStyleBlock()
    }
    message("success","Image add successfully")
}
function removeImage(type)
{

    if(type=="Body") {
        let blur = document.getElementById("body-blur").value
        styleManager.add('#backTemplate::before',
            "background-image: url('/');background-repeat:no-repeat;" +
            "background-size: cover;" +
            "content: '';" +
            "position: fixed;" +
            "top: 0;" +
            "left: 0;" +
            "z-index: -9;" +
            "width: 100%;" +
            "height: 100%;" +
            "  -webkit-filter: blur(" + blur + "px);" +
            "  -moz-filter: blur(" + blur + "px);" +
            "  -o-filter: blur(" + blur + "px);" +
            "  -ms-filter: blur(" + blur + "px);" +
            "  filter: blur(" + blur + "px);");

        document.getElementById("selectBodyImage").src = ""
        document.getElementById("selectBodyImage").style.display = "none"
        document.getElementById("selectBodyImage").parentNode.querySelector("span").style.display = "block"
        document.getElementById("backTemplate").style.backgroundImage = ""
        setStyleBody()
    }else{
        document.getElementById("selectBlockImage").src = ""
        setStyleBlock()
    }
}
function removeImageLogo()
{
    //menu-text-color
    let colorA = document.getElementById("menu-active-text-color").value
    let color = document.getElementById("menu-text-color").value
    styleManager.add('#myTopnav>a:first-child',
        "background-image: url('');background-repeat:no-repeat;" +
        "min-width:100px;min-height:50px;" +
        "color:"+color+";"+
        "background-size:100px;50px");
    styleManager.add('#myTopnav>a.active:first-child',
        "background-image: url('');background-repeat:no-repeat;" +
        "min-width:100px;min-height:50px;" +
        "color:"+colorA+";"+
        "background-size:100px;50px");
    document.querySelector("#myTopnav>a:first-child").removeAttribute("data-logo")
    document.getElementById("selectLogoImage").src = ""
    document.getElementById("selectLogoImage").style.display = "none"
    document.getElementById("selectLogoImage").parentNode.querySelector("span").style.display="block"
    setStyleBlock()
}

function setMenuSetting()
{
    let styles = document.getElementById("myTopnav").getAttribute("data-style")

    styles.split("\n").forEach(function (style){
        style = style.split("=>")
        let input = style[0].replace(/\s+/,"")


           let  val = style[1]/*.replace(/;/,"")*/


        if(document.getElementById(input))
                document.getElementById(input).value = val

        if(input.match(/size/g))
        {
            document.getElementById(input).value = val.replace(/px/g,"")
        }

        if(input.match(/opacity/g))
            document.getElementById(input).parentNode.querySelector("span").textContent = val
    })
}
function saveTemplate()
{
    let template = document.querySelector("#pasteBlog").outerHTML
    let menu =  document.querySelector("#myTopnav").outerHTML
    let url =  document.querySelector("#pageUrl").value
    if(FORM_ID)
        ajax.saveAll(template,menu,FORM_ID,url)
    else
        message("error","Please select page")
}
function uploadImageClick(e)
{
    document.getElementById("fileUpload").click()
}
$('#summernote').on('summernote.keyup', function(we, e)
{
    let messageG = $("#summernote").summernote('code')
    if(Block.divBlog.className!="paste workPlace")
        Block.divBlog.innerHTML = messageG
});
function setSetting(id)
{
    let styles = document.getElementById(id).getAttribute("data-style")

    let Padding = []
    let Border = []
    if(styles){
        styles.split(";").forEach(function (input){
            let style = input.split("=>")
            let Input = style[0]
                Input = Input.replace(/\s+/,"")
            let val = style[1]
            if(Input==".block-padding")
                Padding.push(val)
             else if(Input==".border-radius")
                Border.push(val)
        })
        styles.split(";").forEach(function (style){
            style = style.split("=>")
            let input = style[0]
                input = input.replace(/\s+/,"")
            let val = style[1]
            if(input!="") {
                if(document.querySelector(input))
                    document.querySelector(input).value = val
                if(input=="#block-back-opacity" || input=="#block-hover-opacity")
                    document.querySelector(input).parentNode.querySelector("span").innerHTML = val
                if(input==".block-flex")
                    document.querySelectorAll(input).forEach(function (el){
                        el.removeAttribute("checked")
                        if(el.value==val)
                            el.setAttribute("checked",true)
                    })


                if(input==".block-padding"){
                    let num=0
                    document.querySelectorAll(input).forEach(function (el){
                        el.value = Padding[num]
                        num++
                    })
                    }
                if(input==".border-radius"){
                    let num=0
                    document.querySelectorAll(input).forEach(function (el){
                        el.value = Border[num]
                        num++
                    })
                }
                if(input==".block-back-img"){
                    document.querySelector(input).src = val
                }
            }
        })
    }else{
        nullAble("blog")
    }
}
readStyleBody()
function readStyleBody()
{
    if(!document.getElementById("pasteBlog"))
        return
    if(!document.getElementById("pasteBlog").getAttribute("data-style"))
        return
    let styles = document.getElementById("pasteBlog").getAttribute("data-style")

        styles.split(";").forEach(function (input){
        let style = input.split("=>")
        let Input = style[0]
            Input = Input.replace(/\s+/,"")

        let val = style[1]
            if(Input=="selectBodyImage"){
                document.getElementById(Input).src = val
            }
                else if(Input=="body-opacity")
            {
                document.getElementById(Input).parentNode.querySelector("span").innerHTML =  val
                document.getElementById(Input).value = val
            }else{
                if(document.getElementById(Input))
                    document.getElementById(Input).value = val
            }
    })
}
function nullAble(type)
{
//    for menus
    let inputMenu = [
        "#menu-back-color",
        "#menu-opacity",
        "#menu-text-color",
        "#menu-hover-back-color",
        "#menu-hover-opacity",
        "#menu-hover-text-color",
        "#menu-active-back-color",
        "#menu-active-opacity",
        "#menu-active-text-color",
        "#menu-dropdown-back-color",
        "#menu-dropdown-opacity",
        "#menu-dropdown-text-color",
        "#menu-dropdown-hover-back-color",
        "#menu-dropdown-hover-opacity",
        "#menu-dropdown-hover-text-color",
        "#menu-font-style",
        "#menu-font-family",
        "#menu-font-weight",
        "#menu-font-size",
        //img
        "#selectLogoImage"
    ]
    let inputBody = [
        "#body-back-color",
        "#body-opacity",
        "#body-blur",
        //img
        "#selectBodyImage"
    ]
//  for blog elements
    let inputs = [
        ".block-flex",
        "#block-back-opacity",
        ".block-back-color",
        ".block-text-color",
        ".block-padding",
        ".block-blur",
        "#block-hover-opacity",
        ".block-hover-back-color",
        ".block-hover-text-color",
        ".block-hover-blur",
        "#block-width-ext",
        ".block-back-width",
        ".border-radius",
        //img
        ".block-back-img",
    ]
    let args = ""

    if(type=="menu")
         args = inputMenu
    else if(type=="blog")
        args = inputs
    else if(type=="body")
        args = inputBody

    args.forEach(function (cl) {
        document.querySelectorAll(cl).forEach(function (input){
            if(cl==".block-back-img" || cl=="#selectLogoImage" || cl=="#selectBodyImage")
                input.src = ""
            else if(cl == ".block-flex")
                input.removeAttribute("checked")
            else if(cl == ".block-back-width")
                input.value = 100
            else if(cl == "#block-width-ext")
                input.value = "%"
            else if(cl == ".block-padding")
                input.value = "10"
            else if(cl == "#block-back-opacity" || cl=="#block-hover-opacity" || cl=="#body-opacity"){
                input.value = 0
                document.querySelector(cl).parentNode.querySelector("span").innerHTML = "0"
            } else
                input.value = 0
        })
    })
}
//Set Menu Style
setStyleTag()
function setStyleTag()
{
    document.querySelectorAll("div[data-style-read]").forEach(function (div) {

        let styleHead = div.getAttribute("data-style-read").split("[#]")
        let styleCode = div.getAttribute("data-style-code").split("[#]")
        let index = 0
            styleHead.forEach(function (head){
                if(head.replace(/\s+/,"")!==""){
                    styleManager.add(head,styleCode[index])
                    index++
                }
            })
    })
}
function changeDivPosition(type)
{

    let num = 0,index,rel
    let allBlock = document.querySelectorAll("div.blocks"),allBlocks = document.querySelectorAll("div.blocks"),inner=""

    document.querySelectorAll("div.paste").forEach(function (div) {
        if(div.id==Block.divBlog.id)
            index = num
        num++
    })
    let Num = 0,Num2 = allBlock.length-1
    if(index!==(allBlock.length-1) && index!==0)
    document.getElementById("pasteBlog").innerHTML = ""
    if(type=="bottom")
        allBlocks.forEach(function (div) {
        if(index==Num){
            if(allBlock[index+1])
                document.getElementById("pasteBlog").appendChild(allBlock[index+1])
        }else if((index+1)==Num){
                document.getElementById("pasteBlog").appendChild(allBlock[index])
        }else{
                document.getElementById("pasteBlog").appendChild(allBlock[Num])
        }

        Num++
    })
    else
        allBlocks.forEach(function (div) {

                if(index-1==Num){
                        document.getElementById("pasteBlog").appendChild(allBlock[index])
                }else if((index)==Num){
                    if(allBlock[index-1])
                        document.getElementById("pasteBlog").appendChild(allBlock[index-1])
                }else{
                    document.getElementById("pasteBlog").appendChild(allBlock[Num])
                }

            Num++
        })
    moving()
}
function cloneDiv()
{
    if(Block.divBlog.className==="paste workPlace")
    {
        let DivId = Math.floor(Math.random() * 1000)
        let CLONE = Block.divBlog.parentNode.cloneNode(true) //= "block-"+DivId+"-back"
        let id1 = CLONE.id
            CLONE.id = "block-"+DivId+"-back"

        let id2 = CLONE.querySelector(".paste").id
            CLONE.querySelector(".paste").id = "block-"+DivId
            CLONE.querySelector(".paste").setAttribute("data-style-read",CLONE.querySelector(".paste").getAttribute("data-style-read").replace(id1,CLONE.id))
            CLONE.querySelector(".paste").setAttribute("data-style-read",CLONE.querySelector(".paste").getAttribute("data-style-read").replace(id2,"block-"+DivId))
            CLONE.querySelector(".paste").setAttribute("data-style-read",CLONE.querySelector(".paste").getAttribute("data-style-read").replace(id2+":hover","block-"+DivId+":hover"))


        CLONE.querySelector(".paste").querySelectorAll(".paste-inner").forEach(function (div) {

            let id3 = div.id
                div.id = 'element-'+DivId+"-back"
            let id4 = div.querySelector(".sub").id
                div.querySelector(".sub").id = 'element-'+DivId

            div.querySelector(".sub").setAttribute("data-style-read",div.querySelector(".sub").getAttribute("data-style-read").replace(id3,div.id))
            div.querySelector(".sub").setAttribute("data-style-read",div.querySelector(".sub").getAttribute("data-style-read").replace(id4,div.querySelector(".sub").id))
            div.querySelector(".sub").setAttribute("data-style-read",div.querySelector(".sub").getAttribute("data-style-read").replace(id4+":hover",div.querySelector(".sub").id+":hover"))

        })
        document.getElementById("pasteBlog").appendChild(CLONE)
    }else{
        let DivId = Math.floor(Math.random() * 1000)
        let CLONE = Block.divBlog.parentNode.cloneNode(true)
        let id1 = CLONE.id
            CLONE.id = "element-"+DivId+"-back"
        let id2 = CLONE.querySelector(".sub").id
            CLONE.querySelector(".sub").id = 'element-'+DivId
        CLONE.querySelector(".sub").setAttribute("data-style-read",CLONE.querySelector(".sub").getAttribute("data-style-read").replace(id1,CLONE.id))
        CLONE.querySelector(".sub").setAttribute("data-style-read",CLONE.querySelector(".sub").getAttribute("data-style-read").replace(id2,CLONE.querySelector(".sub").id))
        CLONE.querySelector(".sub").setAttribute("data-style-read",CLONE.querySelector(".sub").getAttribute("data-style-read").replace(id2+":hover",CLONE.querySelector(".sub").id+":hover"))
        Block.divBlog.parentNode.parentNode.appendChild(CLONE)

    }
    setStyleTag()
    setOnClicks()
    moving()
}
function innerTextToElement()
{
        Block.divBlog.innerHTML = $("#summernote").summernote('code')
        message("success","Inner info successfully!")
}
function pasteForm(el)
{
    let val = $("#summernote").summernote('code')
            $("#summernote").summernote('code',val+"<span> </span> <span> </span><a class='btn btn-outline-info' target='_blank' style='background-color: rgba(0,0,0,0)' href="+el.getAttribute("data-link")+">"+el.getAttribute("data-name")+"</a><br/>")
}
function deleteDiv()
{
    Block.divBlog.parentNode.remove();
}
setMenuSetting()
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
    }
},500)
function uploadImage(e)
{
    ajax.ImageUpload(e.files[0])
}
function uploadImageArea(e)
{
    ajax.ImageUploadArea(e.files[0])
}
function uploadVideoArea(e)
{
    ajax.VideoUploadArea(e.files[0])
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
function showVideoArea(e)
{
    let video = document.createElement("video")
    video.setAttribute("controls",true)
    let div = document.createElement("div")
    div.setAttribute("style","display: flex;justify-content: center;flex-wrap: wrap;border:1px black dotted;padding:10px")



    let button_del = document.createElement("button")
    let button_del_text = document.createTextNode("Delete")
    button_del.setAttribute("class","btn btn-outline-danger")
    button_del.setAttribute("onclick","deleteFromFormAreaVideo('"+e.getAttribute("data-videos")+"')")
    button_del.append(button_del_text)

    // div.appendChild(button_set)
    div.appendChild(button_del)

    let p = document.createElement("p")
    let p_text = document.createTextNode(e.getAttribute("data-videos").replace(/web\/form\/videos\//gm,''))

    p.append(p_text)
    video.setAttribute("src",e.src)

    document.getElementById("videosShowArea").innerHTML = ""
    document.getElementById("videosShowArea").appendChild(video)
    document.getElementById("videosShowArea").appendChild(p)
    document.getElementById("videosShowArea").appendChild(div)

    let divArea = document.querySelector(".modal.note-modal.show")
    divArea.querySelector("input[type='text']").value = e.src
    divArea.querySelector("input[type='button']").removeAttribute("disabled")
}
function uploadVideoClickArea(e)
{
    document.getElementById("fileUploadAreaVideo").click()
}
function deleteFromFormAreaVideo(video)
{
    ajax.deleteFormVideoArea(video)
}
var stringToHTML = function (str)
{
    var parser = new DOMParser()
    var doc = parser.parseFromString(str, 'text/html')
    return doc.body
};
setOnClicks()
function setOnClicks(){
    if (document.querySelector("div.sub"))
    document.querySelectorAll("div.sub").forEach(function (el) {
        el.onclick = function () {
            setTimeout(function (){
                Block.divBlog = el
                Block.innerType = true
                document.getElementById("flexBlog").style.display="none"
                document.getElementById("summernoteDiv").style.display="block"
                setSetting(el.id)
                el.querySelectorAll('*').forEach(function (content) {
                    content.setAttribute("contenteditable","true")
                })
                $("#summernote").summernote('code',el.innerHTML);
            },500)
            message("success", "Successfully select!")
        }
    })
    if (document.querySelector("div.paste"))
    document.querySelectorAll("div.paste").forEach(function (el) {
        el.onclick = function () {
            document.getElementById("summernoteDiv").style.display="none"
            Block.divBlog = el
            Block.innerType = false
            setSetting(el.id)
            document.getElementById("styleBlock").style.display="block"
            document.getElementById("flexBlog").style.display="flex"
            message("success","Successfully select!")
        }
    })
    if (document.querySelector("div#pages>a"))
        document.querySelector("div#pages>a").className = 'btn btn-outline-success btn-sm'
}
function uploadImageClickArea(e) {
    document.getElementById("fileUploadAreaImage").click()
}

function uploadVideoClickArea(e) {
    document.getElementById("fileUploadAreaVideo").click()
}