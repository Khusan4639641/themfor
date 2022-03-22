<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

    <!-- Select2 -->
    <link rel="stylesheet" href="/web/assets/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/web/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        @font-face {
            font-family: PangramBlack;
            src: url('/web/assets/pangram/Pangram-Black.otf') format('otf');
        }
        @font-face {
            font-family: PangramBold;
            src: url('/web/assets/pangram/Pangram-Bold.otf') format('otf');
        }
        @font-face {
            font-family: PangramExtraBold;
            src: url('/web/assets/pangram/Pangram-ExtraBold.otf') format('otf');
        }
        @font-face {
            font-family: PangramExtraLight;
            src: url('/web/assets/pangram/Pangram-ExtraLight.otf') format('otf');
        }
        @font-face {
            font-family: PangramLight;
            src: url('/web/assets/pangram/Pangram-Light.otf') format('otf');
        }
        @font-face {
            font-family: PangramMedium;
            src: url('/web/assets/pangram/Pangram-Medium.otf') format('otf');
        }
        @font-face {
            font-family: PangramRegular;
            src: url('/web/assets/pangram/Pangram-Regular.otf') format('otf');
        }
        div.workPlace{
            margin: 0px auto 50px;
            font-family: 'PangramLight'!important;
        }
        div.formDiv{
            margin-bottom: 20px;
        }
        #blur{
            position: fixed;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border:1px solid blue;
            height: 100%;
            top: 0px;
            width: 100%;
            z-index: -10;
        }
        #show{
            width: 100%;
            height: 100%;
        }
        body{
            font-family: "Times New Roman";
        }
        input[name='norobot']{
            width: 100%;
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
        }
        span#text{
            text-indent: 15px;
        }
    </style>
</head>
<body>
<br>
<form action="/vacancy/<?= $forms->id ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" value="<?= $forms->id ?>" name="id">
        <h4 style="text-align: center;"> <?= $forms->form_name ?> </h4>
        <?= $forms->form_div ?>
        <span style="color: red"><?= (isset($_SESSION['errorCaptcha']) && !empty($_SESSION['errorCaptcha'])) ?  $_SESSION['errorCaptcha']: ""; ?></span>
    </form>
<div id="blur"></div>
<script src="/web/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/web/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/web/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/web/assets/admin/dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->

<!-- AdminLTE for demo purposes -->
<script src="/web/assets/admin/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<!-- Select2 -->
<script src="/web/assets/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/web/assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/web/assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    function statusOffer(e)
    {
        if (e.checked != true)
            document.querySelector("button[data-id='buttonSend']").setAttribute('disabled', 'true')
        else
            document.querySelector("button[data-id='buttonSend']").removeAttribute('disabled')
    }
    $('.select2').select2();

    setBackColor()

    function setBackColor()
    {
        let div = document.getElementById('workPlace')
        let colorBody = "",colorBodyText = ""

        if(div.querySelector("input[name='norobot']"))
        {
            let style = div.querySelector("input[name='norobot']").getAttribute("style")
                div.querySelector("input[name='norobot']").setAttribute("style",style+";text-align:center;")
            let style2 = div.querySelector("input[name='norobot']").parentNode.parentNode.querySelector("div").getAttribute("style")
            div.querySelector("input[name='norobot']").parentNode.parentNode.querySelector("div").setAttribute("style",style2+";width:300px;")
        }

        if(div.getAttribute("data-body-color"))
            colorBody = div.getAttribute("data-body-color")

        if(div.getAttribute("data-body-color-text"))
            colorBodyText = div.getAttribute("data-body-color-text")

        let textColor = document.querySelector('div.formDiv>label').style.color
            document.querySelector("#blur").setAttribute("style", "background: "+colorBody+
                " url('/"+div.getAttribute("data-body-image")+"') no-repeat fixed;background-size:cover;color:"+textColor+";filter:blur("+div.getAttribute("data-blur")+"px);")
            //////////////////////////////////
            //////////////////////////////////
            //////////////////////////////////
        function functionWidth(x) {
            if (x.matches) { // If media query matches
                div.style.width = div.getAttribute("data-width-mobile")
            } else {
                div.style.width = div.getAttribute("data-width")
            }
        }
        //
        var x = window.matchMedia("(max-width: 800px)")
        functionWidth(x) // Call listener function at run time
        x.addListener(functionWidth) // Attach listener function on state changes

        document.querySelector("h4").style.color = colorBodyText
        //Clear Droggable
        div.querySelectorAll('div.formDiv').forEach(function (draggable){
            draggable.removeAttribute("draggable")
            draggable.removeAttribute("onclick")
        })

    //    Set
    }
    document.querySelectorAll("input[type='file']").forEach(function (input) {
    input.onchange = function () {
        let IMG = ['JPG','jpg',"PNG",'png',"csv","CSV"],
            fileName = getFileExtension(input.files[0].name)
        let imgDiv = input.parentNode, img
        if(IMG.indexOf(fileName)===-1)
        {
            if(imgDiv.querySelector("img"))
                imgDiv.querySelector("img").remove()
                return
        }


            if(imgDiv.querySelector("img"))
                img = imgDiv.querySelector("img")
            else{
                img = document.createElement("img")
                img.setAttribute("style", "width:200px;")
            }
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                img.src = event.target.result;
            }
                imgDiv.appendChild(img)
        }
    })
    // program to get the file extension
    function getFileExtension(filename){
        // get file extension
        const extension = filename.split('.').pop();
        return extension;
    }

</script>
</body>
</html>