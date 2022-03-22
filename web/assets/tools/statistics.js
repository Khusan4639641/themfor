$(function () {
    //
    let ajaX = {
        ajaxMethod:'POST',
        select:function (){
            let filter  = document.getElementById('date').value

            var formData = new FormData()
            formData.append('date', filter)
//      ajax method without jquery
            var httpRequest = new XMLHttpRequest()

            httpRequest.open(this.ajaxMethod, '/statistics/')
            httpRequest.send(formData);
            httpRequest.onreadystatechange = function() {
                // Process the server response here.
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        if(httpRequest.responseText) {
                            let result = JSON.parse(httpRequest.responseText)
                            document.getElementById("messageId").textContent = result.message.val
                            document.getElementById("candidateId").textContent = result.candidate.val
                            document.getElementById("formId").textContent = result.form.val
                            document.getElementById("noteId").textContent = result.note.val
                            var condidates = {
                                labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sept','Oct','Nov','Dec'],
                                datasets: [
                                    {
                                        label               : 'New Incomes',
                                        backgroundColor     : 'rgba(60,141,188,0.9)',
                                        borderColor         : 'rgba(60,141,188,0.8)',
                                        pointRadius          : false,
                                        pointColor          : '#3b8bba',
                                        pointStrokeColor    : 'rgba(60,141,188,1)',
                                        pointHighlightFill  : '#fff',
                                        pointHighlightStroke: 'rgba(60,141,188,1)',
                                        data                : [
                                                                result.diagram.Jan.inc.val,
                                                                result.diagram.Feb.inc.val,
                                                                result.diagram.Mar.inc.val,
                                                                result.diagram.Apr.inc.val,
                                                                result.diagram.May.inc.val,
                                                                result.diagram.Jun.inc.val,
                                                                result.diagram.Jul.inc.val,
                                                                result.diagram.Aug.inc.val,
                                                                result.diagram.Sept.inc.val,
                                                                result.diagram.Oct.inc.val,
                                                                result.diagram.Nov.inc.val,
                                                                result.diagram.Dec.inc.val
                                                        ]
                                    },
                                    {
                                        label               : 'Success',
                                        backgroundColor     : 'rgba(80, 200, 120, 1)',
                                        borderColor         : 'rgba(80, 200, 120, 1)',
                                        pointRadius         : false,
                                        pointColor          : 'rgba(80, 200, 120, 1)',
                                        pointStrokeColor    : '#50C878',
                                        pointHighlightFill  : '#fff',
                                        pointHighlightStroke: 'rgba(80, 200, 120,1)',
                                        data                : [
                                                                result.diagram.Jan.suc.val,
                                                                result.diagram.Feb.suc.val,
                                                                result.diagram.Mar.suc.val,
                                                                result.diagram.Apr.suc.val,
                                                                result.diagram.May.suc.val,
                                                                result.diagram.Jun.suc.val,
                                                                result.diagram.Jul.suc.val,
                                                                result.diagram.Aug.suc.val,
                                                                result.diagram.Sept.suc.val,
                                                                result.diagram.Oct.suc.val,
                                                                result.diagram.Nov.suc.val,
                                                                result.diagram.Dec.suc.val
                                                        ]
                                        },
                                ]
                            }
                            //
                            //-------------
                            //- BAR CHART -
                            //-------------
                            if(document.getElementById('barChart')) {
                                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                                var barChartData = $.extend(true, {}, condidates)
                                var temp0 = condidates.datasets[0]
                                var temp1 = condidates.datasets[1]
                                barChartData.datasets[0] = temp1
                                barChartData.datasets[1] = temp0

                                var barChartOptions = {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    datasetFill: false
                                }

                                var barChart = new Chart(barChartCanvas, {
                                    type: 'bar',
                                    data: barChartData,
                                    options: barChartOptions
                                })
                            }
                        }
                    } else {
                        message('error','There was a problem with the request.')
                    }
                }
            }
        },
    }
    if (document.getElementById('date')) ajaX.select()
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    setSetting()
    function setSetting()
    {
        var httpRequest = new XMLHttpRequest()
        httpRequest.open("POST", '/setting-select/')
        httpRequest.send();
        httpRequest.onreadystatechange = function() {
            // Process the server response here.
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    if(httpRequest.responseText) {

                        let result = JSON.parse(httpRequest.responseText)

                        result.forEach(function (input) {
                            if(document.querySelector("a.brand-link") && input.property==='siteName')
                                document.querySelector("a.brand-link>span").textContent = input.value

                            if(document.querySelector("a.d-block") && input.property==='user')
                                document.querySelector("a.d-block").textContent = input.value
                        })
                    }
                } else {
                    message('error','There was a problem with the request.')
                }
            }
        }
    }
})