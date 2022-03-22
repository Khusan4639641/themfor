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
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<form style="display: none" id="logout-form" action="" method="POST" class="d-none">
</form>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?=$url?>/" target="_blank" class="nav-link">Home page</a>
            </li>
        </ul>
<!--form-->

        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <? if($status==true): ?>
                <li>
                    <a class="dropdown-item" href="<?=$url?>/logout">
                        logout
                    </a>
                </li>
            <? else: ?>
                <li>
                    <a class="dropdown-item" href="<?=$url?>/registration">
                        login
                    </a>
                </li>
            <? endif; ?>
        </ul>
        <!-- SEARCH FORM -->

        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?=$url?>/admin/" class="brand-link">
            <img src="/web/assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Web Site Name</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- SidebarSearch Form -->
            <!-- Sidebar Menu -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/web/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" >User name</a>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            <div class="sidebar-search-results">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                            <div class="search-title">
                                <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
                            </div>
                            <div class="search-path">
                            </div>
                        </a>
                </div>
            </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item"></li>
                    <li class="nav-header">FORMS & MESSAGES</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            
                            <p>
                                Forms
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/form-create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/form-list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/form-disabled-list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Disabled`s</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            
                            <p>
                                Message
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/message-new" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/message-history" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sends</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">CANDIDATE</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            
                            <p>
                                Candidates
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/candidate" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Incomes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/candidate-success" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Actives</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/candidate-disabled" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Disabled`s</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">NOTES</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            
                            <p>
                                Notes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/note-create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create note</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/note-active" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active notes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=$url?>/admin/note-disabled" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Disabled notes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">LANDING PAGE</li>
                    <li class="nav-item">
                        <a href="<?=$url?>/admin/landing/" target="_blank" class="nav-link">
                            <i class="nav-icon fas fa-pager"></i>
                            <p>
                                LANDING PAGE
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">SETTINGS</li>
                    <li class="nav-item">
                        <a href="<?=$url?>/admin/setting" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?=$this->section('content')?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
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
<script src="/web/assets/tools/tools.js" type="text/javascript"></script>



<script src="/web/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/web/assets/admin/plugins/codemirror/codemirror.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/web/assets/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<script src="/web/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/web/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/web/assets/tools/statistics.js" type="text/javascript"></script>
<script>

    $(function () {
        $(".universalTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $('.select2').select2();
</script>

<script>
    $(function () {
        // Summernote
        if(document.querySelector("#email_message"))
            $('#email_message').summernote({
                height: 500,   //set editable area's height
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
        if(document.querySelector("#content"))
            $('#content').summernote({
                height: 500,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });

        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

    })
</script>
<? if(isset($message) && !empty($message)):?>
    <script>
        alert("<?=$message?>");
        setTimeout("window.location.href =\"/\"",1000);
    </script>
<? endif; ?>
</body>
</html>
