@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Incomes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transferencias</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">

                <div class="col-md-4">
                    <!-- /.info-box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 style="color: green" class="card-title">Transferencias:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @foreach ($transfers as $transfer)
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="chart-legend clearfix">
                                            <li>Id transferencia: {{ $transfer->id }}</li>
                                            <li>Desde: {{ $transfer->from }}</li>
                                            <li>Hacia: {{ $transfer->to }}</li>
                                            <li>Monto: {{ $transfer->ammount }}</li>
                                            <li>Comentario: {{ $transfer->comment }}</li>
                                            <li>Fecha: {{ $transfer->created_at }}</li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <li>--------------------------------------------</li>
                            @endforeach
                            
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <ul class="nav nav-pills flex-column">
                                {{--  ver que poner acá (footer de card)  --}}
                                <ul class="chart-legend clearfix">
                                    <a href="javascript:history.back(-1);" class="btn btn-success btn-sm"><i
                                            class="fas fa-angle-left"></i> Volver </a>
                                </ul>

                            </ul>

                        </div>

                        <!-- /.footer -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
@include('footer')
</div>
<!-- ./wrapper -->

@include('scripts')


</body>

</html>
