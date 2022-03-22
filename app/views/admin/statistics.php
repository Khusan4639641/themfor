<?php $this->layout('layout/layout',['status'=>true,'url'=>$url,'webName'=>$webName]) ?>
<link rel="stylesheet" href="/web/assets/admin/plugins/daterangepicker/daterangepicker.css">
<section class="content">
    <div class="container-fluid">
        <br>
        <h3>Statistics</h3>
        <hr>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Send messages</span>
                        <span class="info-box-number" id="messageId">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Success candidates</span>
                        <span class="info-box-number" id="candidateId">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Form count</span>
                        <span class="info-box-number" id="formId">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-calendar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Count of Notes</span>
                        <span class="info-box-number" id="noteId">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <form action="/admin/" method="get">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="number" min="1900" name="date" max="2099" step="1"
                                   value="<? if(isset($_GET) && !empty($_GET)) echo $_GET['date'];
                                   else echo date("Y"); ?>" id="date" class="form-control" />
                            <button style="margin-left: 10px" class="btn btn-outline-dark" id="filterButton">Filter</button>
                    </div>
                    </form>
                    <!-- /.input group -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- /.col (LEFT) -->
                            <div class="col-md-12">
                                <!-- BAR CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Candidates</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 388px;" width="485" height="312" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- STACKED BAR CHART -->
                                <!-- /.card -->

                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>