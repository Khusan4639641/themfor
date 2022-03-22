function ableInput(el)
{
    if(el.parentNode.parentNode.querySelector("input").getAttribute("readonly")!=null)
        el.parentNode.parentNode.querySelector("input").removeAttribute("readonly")
    else
        el.parentNode.parentNode.querySelector("input").setAttribute("readonly",true)
}
let setting = {
    ajaxMethod:'POST',
    init:function (key,val) {
        if(val.replace('/\s+/','')===""){
            message("error","Please input info!")
            return
        }

        var formData = new FormData()
        formData.append(key,val)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/setting-set/')
        httpRequest.send(formData);
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText)
                    {
                        if(key==='siteName')
                            document.querySelector("a.brand-link>span").textContent = val

                        if(document.querySelector("a.d-block") && key==='user')
                            document.querySelector("a.d-block").textContent = val

                            message('success','Change Successfully!')
                    }
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    select:function (){
        var httpRequest = new XMLHttpRequest()
        httpRequest.open(this.ajaxMethod, '/setting-select/')
        httpRequest.send();
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText) {
                        let result = JSON.parse(httpRequest.responseText)

                            result.forEach(function (input) {
                                if(document.querySelector([`input[name=${input.property}]`]))
                                {
                                    if(input.property!=='password' && input.property!=='gmail_pass')
                                        document.querySelector([`input[name=${input.property}]`]).value = input.value

                                    if(document.querySelector("a.brand-link") && input.property==='siteName')
                                        document.querySelector("a.brand-link>span").textContent = input.value

                                    if(document.querySelector("a.d-block") && input.property==='user')
                                        document.querySelector("a.d-block").textContent = input.value
                                }
                            })
                    }
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    passCheck:function (pass) {
        var formData = new FormData()
        formData.append('pass',pass)
        var httpRequest = new XMLHttpRequest()
        httpRequest.open(this.ajaxMethod, '/pass-check/')
        httpRequest.send(formData);
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText) {
                        let result = JSON.parse(httpRequest.responseText)

                        if(result[0]==='true') {
                            document.querySelector("button[data-dismiss='modal']").click()
                            message('success', "Confirm successfully!")
                            document.querySelector("input[name='password']").removeAttribute('readonly')
                            document.querySelector("input[name='gmail_pass']").removeAttribute('readonly')
                            document.querySelector("input[name='gmail_pass']").value = result[1]

                            document.querySelector("input[name='password']").setAttribute("onchange","setting.init(this.name,this.value)")

                            document.querySelector("input[name='gmail_pass']").setAttribute("onchange","setting.init(this.name,this.value)")

                            document.querySelectorAll("input[type='password']").forEach(function (el)
                            {
                                el.parentNode.parentNode.querySelector("button").setAttribute('class',"btn btn-outline-dark")
                                el.parentNode.parentNode.querySelector("button").setAttribute('onclick',"showInput(this)")
                                el.parentNode.parentNode.querySelector("button").textContent = "Show"
                                el.parentNode.parentNode.querySelector("button").removeAttribute("data-toggle")
                                el.parentNode.parentNode.querySelector("button").removeAttribute("data-target")
                            })
                        }
                    }
                } else {
                        message('error','There was a problem with the request.')
                }
            }
        }
    }
}
setting.select()
document.getElementById("example1").querySelectorAll("input").forEach(function (input) {
    input.onchange = function (){
        if(input.getAttribute('name')!=='password' && input.getAttribute('name')!=='gmail_pass'){
            setting.init(input.getAttribute('name'),input.value)
        }
    }
})
function changeType()
{
    if(document.querySelector("input[name='old_password']").getAttribute("type")==='password')
        document.querySelector("input[name='old_password']").setAttribute("type",'text')
    else
        document.querySelector("input[name='old_password']").setAttribute("type",'password')
}
function setPassword()
{
    setting.passCheck(document.querySelector("input[name='old_password']").value)
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
function showInput(el)
{
    let input = el.parentNode.parentNode.querySelector("input")
    if(input.getAttribute("type")==='password')
    {
        el.textContent = "Hide"
        input.setAttribute("type","text")
    } else {
        el.textContent = "Show"
        input.setAttribute("type","password")
    }
}