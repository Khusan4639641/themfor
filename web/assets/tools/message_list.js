let ajax = {
    ajaxMethod:'POST',
    viewMessage:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/message-history/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let result = JSON.parse(httpRequest.responseText)
                    document.querySelector("#message").innerHTML = result.message
                    // message("success","Delete successfully")
                } else {
                    // message('error','There was a problem with the request.')
                }
            }
        }
    },
    deleteMessage:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/message-delete/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(!httpRequest.responseText) {
                        message("success", "Delete successfully")
                        setTimeout(function (){
                            location.reload()
                        },1000)
                    }
                } else {
                    // message('error','There was a problem with the request.')
                }
            }
        }
    },
    select:function (id){
        var formData = new FormData()
        formData.append('id', id)
//      ajax method without jquery
        var httpRequest = new XMLHttpRequest()

        httpRequest.open(this.ajaxMethod, '/candidate-select/')
        httpRequest.send(formData);

        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    document.getElementById("info").innerHTML = ""
                    if(httpRequest.responseText) {
                        let result = JSON.parse(httpRequest.responseText)[0],rep_val=[],rep_key=[],$replace = [],afterReplace = []
                        let download
                        let In = 0
                        result.structure.split(",").forEach(function (el) {
                            let data = el.split("=>")
                                rep_key.push(data[1])
                                rep_val.push(data[0])
                            if(data[1].match(/file/))
                                download = In
                            In++
                        })
                        result.income.split("@#@").forEach(function (el) {
                                $replace.push(el)
                        })
                        let index = 0
                        $replace.forEach(function (val) {
                            afterReplace.push(val.replace(rep_key[index],rep_val[index]))
                            index++
                        })
                        index = 0
                        afterReplace.forEach(function (el) {
                            let data = el.split("=>")
                            let key = data[0]
                            let val = data[1]
                            let tr = document.createElement("tr")
                                tr.setAttribute("draggable",'true')
                                tr.setAttribute("class",'draggableV')
                                tr.setAttribute("style",'cursor:move;')
                            let td0 = document.createElement("td")
                            let td1 = document.createElement("td")
                            let td2 = document.createElement("td")

                            let td2_a = document.createElement("a")
                                td2_a.setAttribute("download",'')
                                td2_a.setAttribute("href",'/web/uploads/'+val)

                            let td1X = document.createTextNode(key)
                            let td2X = document.createTextNode(val)

                            let radio = document.createElement("input")
                                radio.setAttribute("type","checkbox")
                                radio.setAttribute("checked",true)
                                radio.setAttribute("value",el)
                                radio.setAttribute("name","resume[]")
                                td0.appendChild(radio)
                                td1.appendChild(td1X)
                                if(download===index){
                                    if((['JPG','PNG','jpg','CSV','png','csv']).indexOf(getFileExtension(val).replace(/\s+/,""))!==-1)
                                    {

                                        let img = document.createElement("img")
                                            img.setAttribute("style","width:200px;")
                                            img.setAttribute("src",'/web/uploads/'+val)
                                            td2_a.append(img)
                                            td2.appendChild(td2_a)
                                    }else {
                                        td2_a.append(td2X)
                                        td2.appendChild(td2_a)
                                    }
                                }else
                                    td2.appendChild(td2X)

                                tr.appendChild(td0)
                                tr.appendChild(td1)
                                tr.appendChild(td2)
                            document.getElementById("info").appendChild(tr)
                            index++
                        })
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
                    }
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
function infoCome(id)
{
    ajax.select(id)
}
function getFileExtension(filename){
    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}
