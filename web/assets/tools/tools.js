if(document.getElementById('workPlace')) {
    moving()
}
    var styleManager = (function () {
        // Create the <style> tag
        var style = document.createElement("style")

        // WebKit hack
        style.appendChild(document.createTextNode(""));

        // Add the <style> element to the page
        document.head.appendChild(style);

        function getStyleRuleIndexBySelector(selector, prop) {
            var result = [], i,
                value = (prop ? selector + "{" + prop + "}" : selector).replace(/\s/g, ''), // remove whitespaces
                s = prop ? "cssText" : "selectorText";

            for (i = 0; i < style.sheet.cssRules.length; i++)
                if (style.sheet.cssRules[i][s].replace(/\s/g, '') == value)
                    result.push(i);

            return result;
        };

        return {
            style: style,

            getStyleRuleIndexBySelector: getStyleRuleIndexBySelector,

            add(prop, value) {
                return style.sheet.insertRule(`${prop}{${value}}`, style.sheet.cssRules.length);
            },

            remove(selector, prop) {
                var indexes = getStyleRuleIndexBySelector(selector, prop), i = indexes.length;
                // reversed iteration so indexes won't change after deletion for each iteration
                for (; i--;)
                    style.sheet.deleteRule(indexes[i]);
            }
        }
    })();

    function moving() {
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
                const afterElement = getDragAfterElement(container, e.clientY)
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

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect()
            const offset = y - box.top - box.height / 2
            if (offset < 0 && offset > closest.offset) {
                return {offset: offset, element: child}
            } else {
                return closest
            }
        }, {offset: Number.NEGATIVE_INFINITY}).element
    }

    let DivId = Math.floor(Math.random() * 1000)
    let SaveId
    let SaveType
    var ajax = {
        ajaxMethod: 'POST',
        showFormOne: function (id) {

            var formData = new FormData()
            formData.append('id', id)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/show-form-one/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        var $return = JSON.parse(httpRequest.responseText)
                        let h5 = document.createElement("h5")
                        h5.setAttribute("id", 'FormName')
                        h5.setAttribute("style", "font-style: italic;margin-top: 10px;text-align: center;color: #989898;position: relative;z-index: 2")
                        let h5_x = document.createTextNode($return.form_name)
                        h5.appendChild(h5_x)

                        if (document.getElementById("bodyExample"))
                            document.getElementById("bodyExample").innerHTML = h5.outerHTML + $return.form_div

                        if (document.getElementById("workPlace"))
                            document.getElementById("workPlace").style.position = 'relative'

                        document.getElementById("message").value = strip($return.messageG)

                        setBackColor()

                        $('.select2').select2();
                    } else
                        message('error', 'There was a problem with the request.')
                }
            }
        },
        select: function (id) {

            var formData = new FormData()

            formData.append('id', id)

//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/form-select/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {

                        var $return = JSON.parse(httpRequest.responseText)
                        if (document.getElementById('details'))
                            document.getElementById('details').innerHTML = ''

                        $return[1] = $return[1].replace("data-id='id'", "data-id='" + id + "-" + DivId + "' id='" + id + "-" + DivId + "-div' data-num='" + DivId + "'")
                        var div = stringToHTML($return[1]).querySelector('div')
                        let checkDIV = document.getElementById('workPlace')

                        document.getElementById('workPlace').querySelectorAll("textarea").forEach(function (element) {
                            element.style = "background: rgba(255,255,255,0.3);border:1px rgba(255,255,255,0.3) solid;color:white"
                        })
                        document.getElementById('workPlace').querySelectorAll("input").forEach(function (element) {
                            element.style = "background: rgba(255,255,255,0.3);border:1px rgba(255,255,255,0.3) solid;color:white"
                        })
                        document.getElementById('workPlace').querySelectorAll("button").forEach(function (element) {
                            element.style.borderRadius = "20px"
                        })
                        if (div.querySelector("input[data-offer='true']") && checkDIV.querySelector("input[data-offer='true']")) {
                            message("error", "You have a input of offer")
                            return;
                        }


                        if (div.querySelector("input[data-type='captcha']") && checkDIV.querySelector("input[data-type='captcha']")) {
                            message("error", "You have a input of captcha")
                            return;
                        }


                        if (div.querySelector("button[data-id='buttonSend']") && checkDIV.querySelector("button[data-id='buttonSend']")) {
                            message("error", "You have a input for Send button")
                            return;
                        }


                        if (div.querySelector("input[data-mail='true']") && checkDIV.querySelector("input[data-mail='true']")) {
                            message("error", "You have a input of Email confirm")
                            return;
                        }


                        //

                        document.getElementById('workPlace').appendChild(div)
                        let change = div.querySelectorAll('.flexForm>*');


                        if (change.length == 2) {
                            change = change[0]
                        } else {
                            change = change[0]
                        }

//                      Change name of => input @ select @ button @ textarea
                        if (change.querySelector('div')) {
                            let input = change.querySelector('div')
                            input = input.querySelector("input")
                            if (input)
                                input.name = input.name + "_" + DivId
                        } else {
                            let input = change.querySelector("input")

                            if (!input) {
                                input = change
                            }
                            let messType = input.getAttribute('data-mail')
                            let messTypeOffer = input.getAttribute('data-offer')

                            if (messTypeOffer == 'true') {
                                if (document.getElementById('buttonSend'))
                                    document.getElementById('buttonSend').setAttribute('disabled', 'true')
                            }

                            if (input.type != 'submit' && messType != 'true' && messTypeOffer != 'true') {
                                if (input.tagName == "SELECT")
                                    input.name = input.name + "_" + DivId + "[]"
                                else
                                    input.name = input.name + "_" + DivId
                            }

                            if (input.type == 'submit' || messTypeOffer == 'true') {
                                let offer = document.querySelector("input[name='offer']")
                                if (offer) {
                                    if (document.querySelector("button[data-id='buttonSend']"))
                                        if (offer.checked != true)
                                            document.querySelector("button[data-id='buttonSend']").setAttribute('disabled', 'true')
                                        else
                                            document.querySelector("button[data-id='buttonSend']").removeAttribute('disabled')
                                }
                            }
                        }


                        let type_input
                        if (change.querySelector('input')) {
                            type_input = change.querySelector('input').type
                        } else {
                            type_input = false
                        }
                        if (change.querySelector('div')) {
                            change = change.querySelector('input')


                            if (change.type == "checkbox") {
                                change.parentNode.parentNode.parentNode.setAttribute('data-number', DivId)
                                change.parentNode.parentNode.parentNode.setAttribute('id', id + "-" + DivId)
                                change.setAttribute('name', change.name +"[]")
                            } else {
                                change.setAttribute('data-number', DivId)
                                change.setAttribute('id', id + "-" + DivId)
                            }
                        } else {
                            if (type_input == "radio") {
                                change.parentNode.parentNode.setAttribute('data-number', DivId)
                                change.parentNode.parentNode.setAttribute('id', id + "-" + DivId)
                            } else {
                                change.setAttribute('data-number', DivId)
                                change.setAttribute('id', id + "-" + DivId)
                            }
                        }

                        SaveId = id + "-" + DivId
                        SaveType = id
                        moving()
                        DivId++
                        message("success", "Add input successfully")
                        setBackColor()
//                      Set height select2

                        $('.select2').select2();
                        document.querySelectorAll('span.select2-selection').forEach(function (el) {
                            el.setAttribute("style", "height:35px;")
                        })
                        formTextColor(document.querySelector("#textColor"));
                        formOpacity(document.querySelector("#FormOpacity"));
                        bodyColorText(document.querySelector("#backColorBody"));
                    } else {
                        alert('There was a problem with the request.')
                    }
                }
            }
        },
        selectWithoutInsert: function (id, e) {
            var formData = new FormData()

            formData.append('id', id)

//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/form-select/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        var $return = JSON.parse(httpRequest.responseText)
                        document.getElementById('infoDetails').innerHTML = 'Details ' + id
                        document.getElementById('details').innerHTML = ''
                        document.getElementById('details').innerHTML = $return[0]
                        let details = document.getElementById('details')
                        SaveType = id
                        setInfoAttribute(details, e)
                        moving()
                    } else {
                        alert('There was a problem with the request.')
                    }
                }
            }
        },
        saveTODB: function (data) {

            var formData = new FormData()
            formData.append('data', data)

//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/save-form/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText == 'exist')
                            message('error', "Form name exist")
                        else {
                            message('success', "Saved Success")
                            setTimeout(function () {
                                location.href = "/admin/form/edit/" + httpRequest.responseText;
                            }, 2000);
                        }

                    } else {
                        alert('There was a problem with the request.')
                    }
                }
            }
        },
        htmlToText: function (data) {

            var formData = new FormData()

            formData.append('data', data)

//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/html-text/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        return httpRequest.responseText
                    } else {
                        alert('There was a problem with the request.')
                    }
                }
            }
        },
        deleteForm: function (id) {
            var formData = new FormData()
            formData.append('id', id)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/delete-form/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText == 1) {
                            location.reload();
                        }
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        deleteFormImage: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/delete-form-image/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText != 'error')
                            document.querySelectorAll("img[data-images='" + httpRequest.responseText + "']").forEach(function (div) {
                                div.remove()
                            })
                        document.getElementById("imageShow").innerHTML = ""
                        message("success", "Delete successfully")
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        deleteFormImageArea: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/delete-form-image/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText != 'error')
                            document.querySelectorAll("img[data-images='" + httpRequest.responseText + "']").forEach(function (div) {
                                div.remove()
                            })
                        document.getElementById("imageShowArea").innerHTML = ""
                        message("success", "Delete successfully")
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        deleteFormVideoArea: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/delete-form-video/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText != 'error')
                            document.querySelector("video[data-videos='" + httpRequest.responseText + "']").remove()
                            document.getElementById("videosShowArea").innerHTML = ""
                        message("success", "Delete successfully")
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        ImageUpload: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/upload-form-image/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText.indexOf("error:") == -1) {

                            let img = document.createElement('img')
                            img.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                            img.setAttribute("src", "/web/form/images/" + httpRequest.responseText)
                            img.setAttribute("data-images", "web/form/images/" + httpRequest.responseText)
                            img.setAttribute("onclick", "showImage(this)")
                            document.getElementById("Images").appendChild(img)

                            if (document.getElementById("ImagesArea")) {
                                let img2 = img.cloneNode(true)
                                document.getElementById("ImagesArea").appendChild(img2)
                            }
                            message("success", "Image successfully upload")
                        } else
                            message("error", httpRequest.responseText.replace(/error:/, ""))
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        ImageUploadArea: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/upload-form-image/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText.indexOf("error:") == -1) {
                            let img = document.createElement('img')
                            img.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                            img.setAttribute("src", "/web/form/images/" + httpRequest.responseText)
                            img.setAttribute("data-images", "web/form/images/" + httpRequest.responseText)
                            img.setAttribute("onclick", "showImageArea(this)")

                            document.getElementById("ImagesArea").appendChild(img)

                            if (document.getElementById("Images")) {
                                let img2 = img.cloneNode(true)
                                document.getElementById("Images").appendChild(img2)
                            }

                            message("success", "Image successfully upload")
                        } else
                            message("error", httpRequest.responseText.replace(/error:/, ""))
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        VideoUploadArea: function (file) {
            var formData = new FormData()
            formData.append('file', file)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/upload-form-video/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText.indexOf("error:") == -1) {
                            let video = document.createElement('video')
                            video.setAttribute("style", "width: 100px;cursor: pointer;margin: 5px;")
                            video.setAttribute("src", "/web/form/videos/" + httpRequest.responseText)
                            video.setAttribute("data-videos", "web/form/videos/" + httpRequest.responseText)
                            video.setAttribute("onclick", "showVideoArea(this)")
                            document.getElementById("VideosArea").appendChild(video)
                            message("success", "Image successfully upload")
                        } else
                            message("error", httpRequest.responseText.replace(/error:/, ""))
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        disableForm: function (id) {
            var formData = new FormData()
            formData.append('id', id)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/disable-form/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText == 1) {
                            location.reload();
                        }
                    } else {
                        message('error', 'There was a problem with the request.')
                    }
                }
            }
        },
        saveUpdateToDB: function (data) {
            let formData = new FormData()
            formData.append('data', data)
//      ajax method without jquery
            let httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/save-update-form/')
            httpRequest.send(formData);
            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (httpRequest.responseText == 'exist')
                            message('error', "This name of form exist!")
                        else
                            message('success', "Successfully saved changes!")
                    } else
                        alert('There was a problem with the request.')

                }
            }
        },
        checkUrlForm: function (url) {

            var formData = new FormData()

            formData.append('url', url)

//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/form-check-url/')
            httpRequest.send(formData);

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {

                        if (httpRequest.responseText == 'exist') {
                            document.getElementById("urlForm").value = url + "-" + DivId
                        } else {
                            document.getElementById("errorMessage").innerText = "Success url"
                            document.getElementById("errorMessage").style.color = "blue"
                            message("success", "Success url")
                            document.getElementById("urlForm").value = url
                        }

                    } else {
                        alert('There was a problem with the request.')
                    }
                }
            }
        },
        imagesShow: function (div) {
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/images-show/')
            httpRequest.send();

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (!document.querySelector("div#imageShowArea")) {
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
                            button_set.setAttribute("class", "btn btn-outline-info")
                            button_set.setAttribute("style", "margin:10px auto;display: block;")
                            button_set.setAttribute("onclick", "uploadImageClickArea()")
                            button_set.append(button_set_text)

                            DIV_0.appendChild(DIV_IMG)
                            DIV_0.appendChild(DIV_IMG_SHOW)
                            div.appendChild(DIV_0)
                            div.appendChild(button_set)
                            div.appendChild(form)
                        }
                        $('.select2').select2();
                    } else
                        message('error', 'There was a problem with the request.')
                }
            }
        },
        videosShow: function (div) {
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/videos-show/')
            httpRequest.send();

            httpRequest.onreadystatechange = function () {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if (!document.querySelector("div#videosShowArea")) {

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
                            button_set.setAttribute("class", "btn btn-outline-info")
                            button_set.setAttribute("style", "margin:10px auto;display: block;")
                            button_set.setAttribute("onclick", "uploadVideoClickArea()")
                            button_set.append(button_set_text)

                            DIV_0.appendChild(DIV_VIDEO)
                            DIV_0.appendChild(DIV_VIDEO_SHOW)
                            div.appendChild(DIV_0)
                            div.appendChild(button_set)

                            div.appendChild(form)
                        }
                        $('.select2').select2();
                    } else
                        message('error', 'There was a problem with the request.')
                }
            }
        },
    };
if(document.getElementById('workPlace')) {
    setBackColor()
    generateUrl()
}

    function showForm(id) {
        ajax.showFormOne(id)
    }

    function fileChoise() {
        alert("script")
    }

    var stringToHTML = function (str) {
        var parser = new DOMParser()
        var doc = parser.parseFromString(str, 'text/html')
        return doc.body
    };
    let DeleteDiv = ""

    function onInfo(e) {
        let id = e.getAttribute('data-type');
        let DivId = e.getAttribute('data-id');
        ajax.selectWithoutInsert(id, e)
        DeleteDiv = DivId
        SaveId = DivId

    }

    function DeleteDivSelect() {
        if (document.getElementById(DeleteDiv + '-div')) {
            document.getElementById(DeleteDiv + '-div').remove()
            document.getElementById("details").innerHTML = ""
            message('success', "Delete input element")
            if (!document.querySelector("input[data-offer='true']")) {
                document.querySelector("button[data-id='buttonSend']").removeAttribute('disabled')
            }
        } else {
            alert("Please select div")
        }
    }

//  new
let tags
    function propertyInputs(e) {
        if (SaveId) {
            let tag = document.getElementById(SaveId)
            let div = document.querySelector('[data-id="' + SaveId + '"]')
            let type = e.getAttribute('data-property')
            let tage_type = e.getAttribute('data-type')
            if (div.querySelector(tage_type))
                tags = div.querySelector(tage_type)

            if (type == 'label') {
                let Label = div.querySelector("label")
                Label.innerHTML = e.value
            } else if (type == 'placeholder') {
                tags.setAttribute('placeholder', e.value)
            } else if (type == 'data-message') {
                if (tags.type != 'checkbox' || tags.type != 'radio')
                    tags.setAttribute('name', e.value)
                else {
                    let inputs = tags.parentNode.parentNode.parentNode.querySelectorAll("input")
                    inputs.forEach(function (input) {
                        input.setAttribute('name', e.value)
                    })
                }
            } else if (type == 'required') {

                if (e.checked == true) {
                    if (tags.type == 'radio' || tags.type == 'checkbox') {
                        let inputs = tags.parentNode.parentNode.parentNode.querySelectorAll("input")
                        inputs.forEach(function (input) {
                            input.setAttribute('required', e.checked)
                        })
                    } else
                        tags.setAttribute('required', e.checked)

                } else {

                    if (tags.type == 'radio' || tags.type == 'checkbox') {
                        let inputs = tags.parentNode.parentNode.parentNode.querySelectorAll("input")
                        inputs.forEach(function (input) {
                            input.removeAttribute('required')
                        })
                    } else
                        tags.removeAttribute('required')


                }

            } else if (type == 'multiple') {
                if (e.checked == true) {
                    tags.setAttribute('multiple', 'multiple')
                    tags.setAttribute('data-dropdown-css-class', 'select2-purple')
                } else {
                    tags.removeAttribute("data-dropdown-css-class")
                    tags.removeAttribute("multiple")
                }
            } else if (type == 'disabled') {
                if (e.checked == true) {
                    if (tags.type == 'radio' || tags.type == 'checkbox') {
                        let inputs = tags.parentNode.parentNode.parentNode.querySelectorAll("input")
                        inputs.forEach(function (input) {
                            input.setAttribute('disabled', e.checked)
                        })
                    } else
                        tags.setAttribute('disabled', e.checked)

                } else {
                    if (tags.type == 'radio' || tags.type == 'checkbox') {
                        let inputs = tags.parentNode.parentNode.parentNode.querySelectorAll("input")
                        inputs.forEach(function (input) {
                            input.removeAttribute('disabled')
                        })
                    } else
                        tags.removeAttribute('disabled')
                }
            } else if (type == 'option') {
                let id = tags.id
                let options = e.value.replace(/$\s+/,"")
                options = options.split("\n")
                document.getElementById(id).innerHTML = ""
                let selected_option = document.querySelector("div.flexFormDetails>select")
                selected_option.innerHTML = ""
                if (options[0] != "") {
                    let option_set = document.createElement('option')
                    let option_text = document.createTextNode(" ")
                    option_set.setAttribute("value", " ")
                    option_set.appendChild(option_text)
                    selected_option.appendChild(option_set)
                }

                options.forEach(function (option) {
                    if(option!=="")
                    {

                        var data = {
                            id: option,
                            text: option
                        };
                        var newOption = new Option(data.text, data.id, false, false);
                        $('#' + id).append(newOption).trigger('change')
                        //SELECT2 OPTIONS
                        let option_set = document.createElement('option')
                        let option_text = document.createTextNode(option)
                        option_set.setAttribute("value", option)
                        option_set.appendChild(option_text)
                        selected_option.appendChild(option_set)
                    }
                })
            } else if (type == 'selected') {

                if (e.value == " ")
                    $("#" + SaveId).val(null).trigger('change');
                else {
                    let selecting = document.querySelectorAll("#" + SaveId + ">*");

                    selecting.forEach(function (element) {
                        if (e.value != element.value) {
                            element.removeAttribute("data-select2-id")
                            element.removeAttribute("selected")
                        } else {
                            element.setAttribute('selected', "selected")
                            $("#" + SaveId).val(e.value).trigger('change');
                        }
                    })
                    $("#" + SaveId).val(e.value).trigger('change');
                }
            } else if (type == 'default') {
                tags.value = e.value
            } else if (type == 'min') {
                tags.setAttribute('minlength', e.value)
            } else if (type == 'max') {
                tags.setAttribute('maxlength', e.value)
            } else if (type == 'text') {
                tag.innerText = e.value
            } else if (type == 'offer') {
                tag.nextElementSibling.innerText = e.value
            } else if (type == 'button') {
                tags.innerHTML = e.value
            } else if (type == 'checked') {
                let id = tags.id
                let checkboxs = e.value.replace(/$\s+/,"")
                checkboxs = checkboxs.split("\n")
                if(document.getElementById(id))
                    document.getElementById(id).innerHTML = ""
                let selected_option = document.querySelector("div.flexFormDetails>select")
                let checkbox_name = document.querySelector("div.flexFormDetails>input[data-property='data-message']")

                if (checkbox_name) {
                    if (checkbox_name.value != "")
                        checkbox_name = checkbox_name.value
                    else
                        checkbox_name = "checkbox[]"

                }
                selected_option.innerHTML = ""
                if (checkboxs[0] != "") {
                    let option_set = document.createElement('option')
                    let option_text = document.createTextNode(" ")
                    option_set.setAttribute("value", " ")
                    option_set.appendChild(option_text)
                    selected_option.appendChild(option_set)
                }
                let pastDiv = document.getElementById(SaveId + "-div")
                pastDiv = pastDiv.querySelector("div.formPaste>div.flexForm")
                pastDiv.innerHTML = ""
                if (tags.type == 'checkbox')
                    checkboxs.forEach(function (checkbox) {
                        if(checkbox!=="") {
                            let div1 = document.createElement('div')
                            div1.setAttribute('class', "form-group clearfix")
                            let div1_div = document.createElement('div')
                            div1_div.setAttribute('class', "icheck-primary d-inline")
                            let div1_div_input = document.createElement('input')
                            div1_div_input.setAttribute("type", 'checkbox')
                            div1_div_input.setAttribute("value", checkbox)
                            div1_div_input.setAttribute("name", checkbox_name)
                            div1_div_input.setAttribute("id", "checkbox-" + checkbox)
                            let div1_div_label = document.createElement('label')
                            div1_div_label.setAttribute("for", "checkbox-" + checkbox)
                            div1_div_label.setAttribute("style", 'color: #212529;')
                            let div1_div_label_text = document.createTextNode(checkbox)

                            div1_div.appendChild(div1_div_input)
                            div1_div_label.appendChild(div1_div_label_text)
                            div1_div.appendChild(div1_div_label)
                            div1.appendChild(div1_div)
                            pastDiv.appendChild(div1)

//                  CHECKBOX OPTIONS
                            let option_set = document.createElement('option')
                            let option_text = document.createTextNode(checkbox)

                            option_set.setAttribute("value", checkbox)

                            option_set.appendChild(option_text)
                            selected_option.appendChild(option_set)
                        }
                    })
                else if (tags.type == 'radio')
                    checkboxs.forEach(function (checkbox) {
                        if(checkbox!=="") {
                            let div1 = document.createElement('div')
                            div1.setAttribute('class', "form-group clearfix")
                            let div1_div = document.createElement('div')
                            div1_div.setAttribute('class', "icheck-primary d-inline")
                            let div1_div_input = document.createElement('input')
                            div1_div_input.setAttribute("type", 'radio')
                            div1_div_input.setAttribute("value", checkbox)
                            div1_div_input.setAttribute("name", checkbox_name)
                            div1_div_input.setAttribute("id", "radio-" + checkbox)
                            let div1_div_label = document.createElement('label')
                            div1_div_label.setAttribute("for", "radio-" + checkbox)
                            div1_div_label.setAttribute("style", 'color: #212529;')
                            let div1_div_label_text = document.createTextNode(checkbox)

                            div1_div.appendChild(div1_div_input)
                            div1_div_label.appendChild(div1_div_label_text)
                            div1_div.appendChild(div1_div_label)
                            div1.appendChild(div1_div)
                            pastDiv.appendChild(div1)

//                  CHECKBOX OPTIONS
                            let option_set = document.createElement('option')
                            let option_text = document.createTextNode(checkbox)

                            option_set.setAttribute("value", checkbox)

                            option_set.appendChild(option_text)
                            selected_option.appendChild(option_set)
                        }
                    })
            } else if (type == 'checking') {
                let val = e.value
                let pastDivs = document.getElementById(SaveId + "-div")
                pastDivs = pastDivs.querySelectorAll("div.formPaste>div.flexForm>div>div>input")


                pastDivs.forEach(function (input) {
                    input.removeAttribute('checked')
                })

                let pastDiv = document.getElementById(SaveId + "-div")
                pastDiv = pastDiv.querySelector("div.formPaste>div.flexForm>div>div>input[value='" + val + "']")

                pastDiv.setAttribute("checked", "checked")
            }
        } else {
            alert("Please select input")
        }

        $('.select2').select2();
        document.querySelectorAll('span.select2-selection').forEach(function (el) {
            el.setAttribute("style", "height:35px;")
        })
        formTextColor(document.querySelector("#textColor"));
    }

    function setInfoAttribute(details, e) {
        message("success", "You selected successfully");
        let tag = document.getElementById(SaveId)

        if (tag.querySelector('div')) {
//      checkbox and radioBox
//        Label
            let tag_label = document.getElementById(SaveId + "-div")

            if (tag_label.querySelector('label'))
                tag_label = tag_label.querySelector('label').innerHTML

            let change_label = details.querySelector('input[data-property="label"]')

            if (change_label) {
                change_label.value = tag_label
            }
//      input name
            let input_name = tag.querySelector('input').name
            let data_message = details.querySelector('input[data-property="data-message"]')
            if (data_message)
                data_message.value = input_name
//      disabled and required
            let disabled = tag.querySelector('input').disabled
            let required = tag.querySelector('input').required

            let change_required = details.querySelector('input[data-property="required"]')
            let change_disabled = details.querySelector('input[data-property="disabled"]')

            if (change_disabled) {
                if (disabled == true) {
                    change_disabled.setAttribute('checked', 'checked')
                } else {
                    change_disabled.removeAttribute('checked')
                }
            }

            if (change_required) {
                if (required == true) {
                    change_required.setAttribute('checked', 'checked')
                } else {
                    change_required.removeAttribute('checked')
                }
            }
//      textarea add blog
            let select_text = ""
            let selected_option = document.querySelector("div.flexFormDetails>select")

            if (selected_option)
                selected_option.innerHTML = ""
//Set default value
            let inputs = tag.querySelectorAll('input')
            let option_set = document.createElement('option')
            let option_text = document.createTextNode("")
            option_set.setAttribute("value", "")
            option_set.appendChild(option_text)
            selected_option.appendChild(option_set)

            inputs.forEach(function (input) {

                select_text += input.getAttribute('value') + "\n"
                let option = input.getAttribute('value')
                let option_check = input.getAttribute('checked')

                option_set = document.createElement('option')
                option_text = document.createTextNode(option)
                option_set.setAttribute("value", option)


                if (option_check == "checked")
                    option_set.setAttribute("selected", 'selected')

                option_set.appendChild(option_text)
                selected_option.appendChild(option_set)
            })

            let select = details.querySelector('textarea')
            if (select)
                select.value = select_text
        }
        else {
            let required = tag.getAttribute('required')
            let disabled = tag.getAttribute('disabled')
            let multiple = tag.getAttribute('multiple')

            let change_required = details.querySelector('input[data-property="required"]')
            let change_disabled = details.querySelector('input[data-property="disabled"]')


            let change_multiple = details.querySelector('input[data-property="multiple"]')

            let tag_label = document.getElementById(SaveId + "-div")
            if (tag_label.querySelector('label'))
                tag_label = tag_label.querySelector('label').innerHTML

            let change_label = details.querySelector('input[data-property="label"]')

            if (change_label) {
                change_label.value = tag_label
            }

            if (change_disabled) {
                if (disabled == 'true') {

                    change_disabled.setAttribute('checked', disabled)
                } else {
                    change_disabled.removeAttribute('checked')
                }
            }

            if (change_required) {
                if (required == 'true') {
                    change_required.setAttribute('checked', required)
                } else {
                    change_required.removeAttribute('checked')
                }
            }

            if (change_multiple) {
                if (multiple == 'multiple') {
                    change_multiple.setAttribute('checked', true)
                } else {
                    change_multiple.removeAttribute('checked')
                }
            }
            let select_text = ""
            let selected_option = document.querySelector("div.flexFormDetails>select")
            if (selected_option)
                selected_option.innerHTML = ""
//Set default value
            let selects = tag.querySelectorAll('select>option')
            selects.forEach(function (element) {
                select_text += element.getAttribute('value') + "\n"

                let option = element.getAttribute('value')
                let option_set = document.createElement('option')
                let option_text = document.createTextNode(option)
                option_set.setAttribute("value", option)
                option_set.appendChild(option_text)
                selected_option.appendChild(option_set)
            })

            let select = details.querySelector('textarea')
            if (select)
                select.value = select_text
//    Input name
            let input_name = tag.getAttribute('name')
            let data_message = details.querySelector('input[data-property="data-message"]')
            if (data_message)
                data_message.value = input_name
//    placeholder
            let placeholder = tag.getAttribute('placeholder')
            let set_placeholder = details.querySelector('input[data-property="placeholder"]')
            if (set_placeholder)
                set_placeholder.value = placeholder

//    default value
            let default_value = tag.value
            let set_default_value = details.querySelector('input[data-property="default"]')
            if (set_default_value)
                set_default_value.value = default_value
//    max length
            let max_length = tag.getAttribute('maxlength')
            let set_max_length = details.querySelector('input[data-property="max"]')
            if (set_max_length)
                set_max_length.value = max_length

//    min length
            let min_length = tag.getAttribute('minlength')
            let set_min_length = details.querySelector('input[data-property="min"]')
            if (set_min_length)
                set_min_length.value = min_length
//    text
            let data_text = tag.textContent
            let set_data_text = details.querySelector('textarea[data-property="text"]')
            if (set_data_text)
                set_data_text.value = data_text

            let button_text = tag.textContent
            let button = details.querySelector('input[data-property="button"]')
            if (button)
                button.value = button_text
        }

        if(e.getAttribute("data-type")==='text:offer')
            details.querySelector("textarea").value = e.querySelector("span#text").textContent


    }

    function changeFormName(e) {
        document.getElementById("FormName").innerHTML = e.value
        generateUrl()
    }

    function saveToDB() {
        let saveArray = {
            formName: "",
            label: [],
            nameInput: [],
            formHtml: "",
            messageG: "",
            url: "",
        }
        let messageG = $("#email_message").summernote('code');

        saveArray.messageG = messageG
        let url = document.getElementById("urlForm").value
        if (!url)
            generateUrl()

        let saveDB = document.getElementById("workPlace")
        saveArray.formHtml = filterInput(saveDB.outerHTML)
        let $data = saveDB.querySelectorAll("label[for='formPaste']")
        saveArray.formName = document.getElementById("FormName").textContent
        $data.forEach(function (element) {
            element = element.parentNode
            if (element.querySelector("label")) {
                let parent = element.querySelector("label")
                parent = parent.parentNode
                let parent_input = parent.querySelector("div.flexForm>input")
                let parent_input2 = parent.querySelector("div.flexForm>*>input")
                let parent_input3 = parent.querySelector("div.flexForm>*>*>input")
                let parent_select = parent.querySelector("div.flexForm>select")
                let parent_textarea = parent.querySelector("div.flexForm>textarea")

                if (parent_input) {
                    if (parent_input.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input.name)
                    }
                }
                if (parent_input2) {
                    if (parent_input2.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input2.name)
                    }
                }
                if (parent_input3) {
                    if (parent_input3.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input3.name)
                    }
                }
                if (parent_select) {
                    saveArray.label.push(element.querySelector("label").textContent)
                    saveArray.nameInput.push(parent_select.name)
                }
                if (parent_textarea) {
                    saveArray.label.push(element.querySelector("label").textContent)
                    saveArray.nameInput.push(parent_textarea.name)
                }
            }
        })
        saveArray.url = url
        saveArray = JSON.stringify(saveArray)
        ajax.saveTODB(saveArray)
    }

    function message(type, message) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        if (type == 'success') {
            Toast.fire({
                icon: 'success',
                title: message
            })
        } else if (type == 'error') {
            Toast.fire({
                icon: 'error',
                title: message
            })
        }
    }

    function filterInput(text) {
        if (text.search('select') != -1) {
            text = text.replace(/<span[\s+A-Za-z0-9='-_%].+<\/span><\/span>/gm, '')
            text = text.replace(/tabindex="-1" aria-hidden="true" data-select2-id="select-[0-9]+"/gm, '')
            return text
        }
        return text
    }

    function deleteForm(id) {
        let r = confirm("Are you sure delete form!")
        if (r == true) {
            ajax.deleteForm(id)
        }
    }

    function saveUpdateToDB(id) {
        let saveArray = {
            id: id,
            formName: "",
            label: [],
            nameInput: [],
            formHtml: "",
            messageG: "",
            url: "",
        }
        let messageG = document.getElementById("email_message").value

        saveArray.messageG = messageG

        let url = document.getElementById("urlForm").value
        if (!url)
            generateUrl()

        let saveDB = document.getElementById("workPlace")
        saveArray.formHtml = filterInput(saveDB.outerHTML)
        let $data = saveDB.querySelectorAll("label[for='formPaste']")
        saveArray.formName = document.getElementById("FormName").textContent
        $data.forEach(function (element) {
            element = element.parentNode
            if (element.querySelector("label")) {
                let parent = element.querySelector("label")
                parent = parent.parentNode
                let parent_input = parent.querySelector("div.flexForm>input")
                let parent_input2 = parent.querySelector("div.flexForm>*>input")
                let parent_input3 = parent.querySelector("div.flexForm>*>*>input")
                let parent_select = parent.querySelector("div.flexForm>select")
                let parent_textarea = parent.querySelector("div.flexForm>textarea")

                if (parent_input) {
                    if (parent_input.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input.name)
                    }
                }
                if (parent_input2) {
                    if (parent_input2.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input2.name)
                    }
                }
                if (parent_input3) {
                    if (parent_input3.name != "norobot") {
                        saveArray.label.push(element.querySelector("label").textContent)
                        saveArray.nameInput.push(parent_input3.name)
                    }
                }
                if (parent_select) {
                    saveArray.label.push(element.querySelector("label").textContent)
                    saveArray.nameInput.push(parent_select.name)
                }
                if (parent_textarea) {
                    saveArray.label.push(element.querySelector("label").textContent)
                    saveArray.nameInput.push(parent_textarea.name)
                }
            }
        })
        saveArray.url = url
        saveArray = JSON.stringify(saveArray)
        ajax.saveUpdateToDB(saveArray)
    }

    function strip(html) {
        var tmp = document.implementation.createHTMLDocument("New").body;
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || "";
    }

    function statusOffer(e) {
        if (e.checked != true)
            document.querySelector("button[data-id='buttonSend']").setAttribute('disabled', 'true')
        else
            document.querySelector("button[data-id='buttonSend']").removeAttribute('disabled')
    }

//Change colors
    function bodyColor(e) {
        let div = document.getElementById("workPlace")
        div.setAttribute('data-body-color', e.value)

        setBackColor()
    }

    function bodyColorText(e) {
        let div = document.getElementById("workPlace")
        div.setAttribute('data-body-color-text', e.value)
        document.getElementById("FormName").style.color = e.value
        setBackColor()
    }

    function formColor(e) {
        let val = hexToRGB(e.value, document.getElementById('FormOpacity').value)
        let div = document.getElementById("workPlace")
        div.setAttribute('data-color', e.value)

        if (div.getAttribute("style")) {
            let style = div.getAttribute("style");

            div.style.backgroundColor = val

        } else
            div.setAttribute("style", "background-color:" + val + ";")

        setBackColor()
    }

    function formTextColor(e) {
        let div = document.getElementById("workPlace")
        div.setAttribute('data-text-color', e.value)

        if (div.getAttribute("style")) {
            div.style.color = e.value

            if (div.querySelector('label')) {
                div.querySelectorAll('label').forEach(function (param) {
                    param.style.color = e.value
                })
            }
            if (div.querySelector('button')) {
                div.querySelector('button').style.color = e.value
                div.querySelector('button').style.border = "border:1px solid " + e.value
            }
        } else
            div.setAttribute("style", "color:" + e.value + ";")

        setBackColor()
    }

    function setWidthForm() {

        let ext = document.getElementById("ext").value
        let val = document.getElementById("formWidth").value

        document.getElementById("workPlace").setAttribute("data-width", val + ext)

        setBackColor()
    }

    function setWidthFormMobile() {

        let ext = document.getElementById("extMobile").value
        let val = document.getElementById("formWidthMobile").value

        document.getElementById("workPlace").setAttribute("data-width-mobile", val + ext)

        setBackColor()
    }

    function setBackColor() {
        if (document.querySelector('#workPlace')) {
            let body = document.querySelector('#workPlace')
//  form body back color set
            if (body.getAttribute("data-body-color"))
                if (document.getElementById("backColor"))
                    document.getElementById("backColor").setAttribute("value", body.getAttribute("data-body-color"))

            if (body.getAttribute("data-opacity")) {
                if (document.getElementById("FormOpacity")) {
                    document.getElementById("FormOpacity").setAttribute("value", body.getAttribute("data-opacity"))
                    document.getElementById("FormOpacity").parentNode.querySelector('span').textContent = body.getAttribute("data-opacity")
                }
            }

            if (body.getAttribute("data-body-color-text")) {
                if (document.getElementById("backColorBody"))
                    document.getElementById("backColorBody").setAttribute("value", body.getAttribute("data-body-color-text"))
                if (document.getElementById("FormName"))
                    document.getElementById("FormName").style.color = body.getAttribute("data-body-color-text")
            }


            let imageBack = ""

            if (body.getAttribute("data-body-image")) {
                imageBack = body.getAttribute("data-body-image")
                if (document.getElementById("bodyExample")) {
                    document.getElementById("bodyExample").style.overflow = "auto"
                    document.getElementById("bodyExample").style.position = "relative"
                    if (document.getElementById("selectBodyImage"))
                        document.getElementById("selectBodyImage").src = "/" + imageBack
                }
            } else {
                if (document.getElementById("selectBodyImage")) {
                    document.getElementById("selectBodyImage").style.display = "none"
                    document.getElementById("selectBodyImage").parentNode.querySelector("span").style.display = "block"
                }
            }
            if (document.getElementById("backBlurBody"))
                document.getElementById("backBlurBody").setAttribute("value", body.getAttribute("data-blur"))

            let blur = body.getAttribute("data-blur")
            if (blur)
                blur = "  -webkit-filter: blur(" + blur + "px);" +
                    "  -moz-filter: blur(" + blur + "px);" +
                    "  -o-filter: blur(" + blur + "px);" +
                    "  -ms-filter: blur(" + blur + "px);" +
                    "  filter: blur(" + blur + "px);"
            else
                blur = ""

            imageBack = "   background: url('/" + body.getAttribute("data-body-image") + "');"

            styleManager.add('#bodyExample::before', "content: '';" +
                imageBack +
                "  position: absolute;" +
                "  left: 0;" +
                "  right: 0;" +
                "  z-index: 0;" +
                "  display: block;" +
                "  background-size:cover;" +
                "  width: 100%;" +
                "  height: 100%;" +
                blur);

//  form back color set
            if (body.getAttribute("data-color")) {
                if (document.getElementById("FormColor"))
                    document.getElementById("FormColor").setAttribute("value", body.getAttribute("data-color"))


                let labels = body.querySelectorAll("label")
                labels.forEach(function (label) {
                    label.style.backgroundColor = "rgba(0,0,0,0)"
                    label.style.color = body.getAttribute("data-text-color")
                })
                let spans = body.querySelectorAll("span")
                spans.forEach(function (span) {
                    if (span.getAttribute('data-text')) {
                        span.style.backgroundColor = "rgba(0,0,0,0)"
                        span.style.color = body.getAttribute("data-text-color")
                    }
                })
            }
//  form text color set
            if (body.getAttribute("data-text-color"))
                if (document.getElementById("textColor"))
                    document.getElementById("textColor").setAttribute("value", body.getAttribute("data-text-color"))
//  form width color set
            if (body.getAttribute("data-width")) {
                let string = body.getAttribute("data-width")
                let ext = string.substr(string.length - 1, string.length)
                if (ext != '%')
                    ext = string.substr(string.length - 2, string.length)

                let val = string.substr(0, string.length - 1)
                if (ext != '%')
                    val = string.substr(0, string.length - 2)

                if (document.getElementById("ext"))
                    document.getElementById("ext").value = ext
                if (document.getElementById("formWidth"))
                    document.getElementById("formWidth").setAttribute("value", val)
            }
//      mobile
            if (body.getAttribute("data-width-mobile")) {
                let stringM = body.getAttribute("data-width-mobile")
                let extM = stringM.substr(stringM.length - 1, stringM.length)
                if (extM != '%')
                    extM = stringM.substr(stringM.length - 2, stringM.length)

                let valM = stringM.substr(0, stringM.length - 1)
                if (extM != '%')
                    valM = stringM.substr(0, stringM.length - 2)

                if (document.getElementById("extMobile"))
                    document.getElementById("extMobile").value = extM
                if (document.getElementById("formWidthMobile"))
                    document.getElementById("formWidthMobile").setAttribute("value", valM)
            }

        }

        if (document.getElementById('workPlace')) {
            document.getElementById('workPlace').querySelectorAll("textarea").forEach(function (element) {
                element.style = "background: rgba(255,255,255,0.3);border:1px rgba(255,255,255,0.3) solid;color:white"
            })

            document.getElementById('workPlace').querySelectorAll("input").forEach(function (element) {
                element.style = "background: rgba(255,255,255,0.3);border:1px rgba(255,255,255,0.3) solid;color:white"
                if (element.name == 'norobot')
                    element.style.width = '100%'
            })

            document.getElementById('workPlace').querySelectorAll("button").forEach(function (element) {
                element.style.borderRadius = "20px"
            })
        }
    }

    function setFormUrl(e) {
        if (document.getElementById("urlForm").getAttribute("data-url") != e.value)
            generateUrl()
    }

    function generateUrl() {
        if (document.getElementById("urlForm")) {
            let formName = document.getElementById("urlForm").value

            if (!formName)
                formName = document.getElementById("formName").value


            let url = formName.replace(/\s+/g, '-').toLowerCase()
            url = url.replace(/\{|\}|\||\[|\]|%|^|#|@|\$|\!|\`|\'|\"|\^|\~|\?|\:|\;|\\|\/|\+|\+|\=|\(|\)|\*/g, '')

            if (document.getElementById("urlForm").getAttribute("data-url") != document.getElementById("urlForm").value)
                ajax.checkUrlForm(url)
            else if (!document.getElementById("urlForm").value)
                document.getElementById("urlForm").value = url
        }
    }

    function showSetting() {
        let Settings = document.getElementById("Settings").style.display

        if (Settings == "none")
            document.getElementById("Settings").style.display = 'block'
        else
            document.getElementById("Settings").style.display = 'none'
    }

    function disabledForm(id) {
        let r = confirm("Are you sure change status of this form!")
        if (r == true) {
            ajax.disableForm(id)
        }
    }

    let set_image

    function setImage(type) {
        set_image = "Body"

    }

    function showImage(e) {
        let img = document.createElement("img")
        let div = document.createElement("div")
        div.setAttribute("style", "display: flex;justify-content: space-between;flex-wrap: wrap;border:1px black dotted;padding:10px")

        let button_set = document.createElement("button")
        let button_set_text = document.createTextNode("Set")
        button_set.setAttribute("class", "btn btn-outline-info")
        button_set.setAttribute("onclick", "uniSetImage('" + e.getAttribute("data-images") + "','" + set_image + "')")
        button_set.append(button_set_text)

        let button_del = document.createElement("button")
        let button_del_text = document.createTextNode("Delete")
        button_del.setAttribute("class", "btn btn-outline-danger")
        button_del.setAttribute("onclick", "deleteFromForm('" + e.getAttribute("data-images") + "')")
        button_del.append(button_del_text)

        div.appendChild(button_set)
        div.appendChild(button_del)

        let p = document.createElement("p")
        let p_text = document.createTextNode(e.getAttribute("data-images").replace(/web\/form\/images\//gm, ''))

        p.append(p_text)
        img.setAttribute("src", e.src)

        document.getElementById("imageShow").innerHTML = ""
        document.getElementById("imageShow").appendChild(img)
        document.getElementById("imageShow").appendChild(p)
        document.getElementById("imageShow").appendChild(div)
    }

    function showImageArea(e) {
        let img = document.createElement("img")
        let div = document.createElement("div")
        div.setAttribute("style", "display: flex;justify-content: center;flex-wrap: wrap;border:1px black dotted;padding:10px")


        let button_del = document.createElement("button")
        let button_del_text = document.createTextNode("Delete")
        button_del.setAttribute("class", "btn btn-outline-danger")
        button_del.setAttribute("onclick", "deleteFromFormAreaImage('" + e.getAttribute("data-images") + "')")
        button_del.append(button_del_text)

        // div.appendChild(button_set)
        div.appendChild(button_del)

        let p = document.createElement("p")
        let p_text = document.createTextNode(e.getAttribute("data-images").replace(/web\/form\/images\//gm, ''))

        p.append(p_text)
        img.setAttribute("src", e.src)

        document.getElementById("imageShowArea").innerHTML = ""
        document.getElementById("imageShowArea").appendChild(img)
        document.getElementById("imageShowArea").appendChild(p)
        document.getElementById("imageShowArea").appendChild(div)

        let divArea = document.querySelector(".modal.note-modal.show")
        divArea.querySelector("input[type='text']").value = e.src
        divArea.querySelector("input[type='button']").removeAttribute("disabled")
    }

    function showVideoArea(e) {
        let video = document.createElement("video")
        video.setAttribute("controls", true)
        let div = document.createElement("div")
        div.setAttribute("style", "display: flex;justify-content: center;flex-wrap: wrap;border:1px black dotted;padding:10px")


        let button_del = document.createElement("button")
        let button_del_text = document.createTextNode("Delete")
        button_del.setAttribute("class", "btn btn-outline-danger")
        button_del.setAttribute("onclick", "deleteFromFormAreaVideo('" + e.getAttribute("data-videos") + "')")
        button_del.append(button_del_text)

        // div.appendChild(button_set)
        div.appendChild(button_del)

        let p = document.createElement("p")
        let p_text = document.createTextNode(e.getAttribute("data-videos").replace(/web\/form\/videos\//gm, ''))

        p.append(p_text)
        video.setAttribute("src", e.src)

        document.getElementById("videosShowArea").innerHTML = ""
        document.getElementById("videosShowArea").appendChild(video)
        document.getElementById("videosShowArea").appendChild(p)
        document.getElementById("videosShowArea").appendChild(div)

        let divArea = document.querySelector(".modal.note-modal.show")
        divArea.querySelector("input[type='text']").value = e.src
        divArea.querySelector("input[type='button']").removeAttribute("disabled")
    }

    function uniSetImage(val, type) {
        let div = document.getElementById("workPlace")
        div.setAttribute("data-" + type + "-image", val)
        if (document.getElementById("bodyExample")) {
            document.getElementById("bodyExample").setAttribute("style", " overflow: auto;position: relative;")
            styleManager.add('#bodyExample::before', "content: '';" +
                "  position: absolute;" +
                "  left: 0;" +
                "  right: 0;" +
                "  z-index: 0;" +
                "  display: block;" +
                "  background-image: url('/" + val + "');" +
                "  background-size:cover;" +
                "  width: 100%;" +
                "  height: 100%;");
        }
        document.getElementById("select" + type + "Image").src = "/" + val
        document.getElementById("selectBodyImage").parentNode.querySelector("span").style.display = "none"
        document.getElementById("selectBodyImage").style.display = "block"
        message("success", "Image add successfully")
    }

    function hexToRGB(hex, alpha) {
        var r = parseInt(hex.slice(1, 3), 16),
            g = parseInt(hex.slice(3, 5), 16),
            b = parseInt(hex.slice(5, 7), 16);

        if (alpha) {
            return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
        } else {
            return "rgb(" + r + ", " + g + ", " + b + ")";
        }
    }

    function formOpacity(e) {
        setBackColor()

        let val = hexToRGB(document.getElementById('FormColor').value, e.value)
        let div = document.getElementById("workPlace")
        div.setAttribute('data-opacity', e.value)

        if (div.getAttribute("style")) {
            div.style.backgroundColor = val;

            if (div.querySelector('div.formDiv>label')) {
                div.querySelector('div.formDiv>label').style.backgroundColor = "none";
            }

        } else
            div.setAttribute("style", "background-color:" + val + ";")

        e.parentNode.querySelector("span").textContent = e.value
    }

    function bodyColorBlur(e) {
        setBackColor()

        let val = e.value

        let div = document.getElementById("workPlace")

        div.setAttribute('data-blur', e.value)
        if (!div.querySelector("div#blurDiv")) {
            styleManager.add('#bodyExample::before', "content: '';" +
                "  -webkit-filter: blur(" + val + "px);" +
                "  -moz-filter: blur(" + val + "px);" +
                "  -o-filter: blur(" + val + "px);" +
                "  -ms-filter: blur(" + val + "px);" +
                "  filter: blur(" + val + "px);");
        }
    }

    function removeImage() {
        let el = document.querySelector('#bodyExample')
        let blur = document.getElementById("backBlurBody").value
        styleManager.add('#bodyExample::before', "content: '';" +
            "  position: absolute;" +
            "  left: 0;" +
            "  right: 0;" +
            "  z-index: 0;" +
            "  display: block;" +
            "  background-image: url('" + blur + "');" +
            "  background-size:cover;" +
            "  width: 100%;" +
            "  height: 100%;" +
            "  -webkit-filter: blur(" + blur + "px);" +
            "  -moz-filter: blur(" + blur + "px);" +
            "  -o-filter: blur(" + blur + "px);" +
            "  -ms-filter: blur(" + blur + "px);" +
            "  filter: blur(" + blur + "px);");
        document.getElementById("workPlace").removeAttribute("data-body-image")
        document.getElementById("selectBodyImage").src = ""
        document.getElementById("selectBodyImage").style.display = "none"
        document.getElementById("selectBodyImage").parentNode.querySelector("span").style.display = "block"
        document.getElementById("bodyExample").style.backgroundImage = ""
    }

    function deleteFromForm(img) {
        ajax.deleteFormImage(img)
    }

    function deleteFromFormAreaImage(img) {
        ajax.deleteFormImageArea(img)
    }

    function deleteFromFormAreaVideo(video) {
        ajax.deleteFormVideoArea(video)
    }

    function uploadImageClick(e) {
        document.getElementById("fileUpload").click()
    }

    function uploadImageClickArea(e) {
        document.getElementById("fileUploadAreaImage").click()
    }

    function uploadVideoClickArea(e) {
        document.getElementById("fileUploadAreaVideo").click()
    }

    function uploadImage(e) {
        ajax.ImageUpload(e.files[0])
    }

    function uploadImageArea(e) {
        ajax.ImageUploadArea(e.files[0])
    }

    function uploadVideoArea(e) {
        ajax.VideoUploadArea(e.files[0])
    }

    if (document.querySelector("div[id='div_Email']"))
        setTimeout(function () {
//      for image
            document.querySelector("button[data-original-title='Picture']").onclick = function (e) {
                let div = document.querySelector(".modal.note-modal.show")
                let past = div.querySelector("input[type='file']").parentNode.parentNode
                div.querySelector("input[type='file']").parentNode.remove()

                div.querySelector("input[type='text']").parentNode.style.with = "100%"

                div.querySelector("div.form-group.note-group-image-url").setAttribute("style", "width:100%;")
                ajax.imagesShow(past)
            }
//      for videos
            document.querySelector("button[data-original-title='Video']").onclick = function (e) {
                let div = document.querySelector(".modal.note-modal.show")
                let past = div.querySelector("div.modal-body")
                ajax.videosShow(past)
            }
            if (document.querySelector("input.note-video-btn")) {
                document.querySelector("input.note-video-btn").onclick = function (e) {
                    if (document.querySelector("video"))
                        document.querySelectorAll("video").forEach(function (Video) {
                            Video.pause()
                        })
                }
//          hidden video button
                document.querySelector("button[data-original-title=\"Video\"]").remove()
            }
        }, 500)