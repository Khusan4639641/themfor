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
</head>
<body>
<br>
<table class="table table-info">
    <thead>
        <tr>
            <th>Key</th>
            <th>Name</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
    <? foreach ($data['show'] as $val): ?>
    <tr>
        <td><?= $val['key'] ?></td>
        <td><?= $val['val'] ?></td>
        <td><?= $val['data'] ?></td>
    </tr>
    <? endforeach; ?>
    </tbody>
</table>

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
    $('.select2').select2();
</script>
</body>
</html>