let ajax = {
    ajaxMethod:'POST',
    select:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/view-note/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let result = JSON.parse(httpRequest.responseText)
                    document.querySelector("#info").innerHTML = "<h4>"+result.subject+"</h4><br/>"+ result.content
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
    Done:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/note-do-it/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    location.reload()
                } else {
                    // message('error','There was a problem with the request.')
                }
            }
        }
    },
    Delete:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/note-delete/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    message("success","Delete successfully")
                    setTimeout(function () {
                        location.reload()
                    },500)
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    },
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
function infoCome(id)
{
    ajax.select(id)
}