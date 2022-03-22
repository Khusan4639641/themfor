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
    <link rel="stylesheet" href="/web/assets/styles/view.css">
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
<div id="backTemplate" ></div>
<?=$template['menu']->menu;?>
<?=$template['template']->template ?>


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
<script src="/web/assets/tools/page.js" type="text/javascript"></script>
</body>
</html>