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
                        <li class="breadcrumb-item active">Accounts</li>
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
                            <h3 style="color: green" class="card-title">Cuentas:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @foreach ($accounts as $account)
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="chart-legend clearfix">
                                            <li>
                                                <a href="{{ route('accountShow', $account->id) }}" class="nav-link">
                                                    {{ $account->name }} (Id: {{ $account->id }})
                                                </a>
                                                Saldo: ${{ $account->saldo }}
                                            </li>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            @endforeach
                            </ul>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="btn-group" role="group">
                                <a href="{{ route('transfer') }}" class="btn btn-info btn-sm rounded mr-2">
                                    <i class="fas fa-exchange-alt"></i> Transferir
                                </a>
                                <a href="{{ route('accountCreate') }}" class="btn btn-success btn-sm rounded mr-2">
                                    <i class="fas fa-plus text-white"></i> Nueva Cuenta
                                </a>
                                <a href="{{ route('transfers') }}" class="btn btn-success btn-sm rounded">
                                    <i class="far fa-eye"></i> Ver historial de transferencias
                                </a>
                            </div>
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

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">

                <div class="col-md-4">
                    <!-- /.info-box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 style="color: green" class="card-title">Ganancias:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- TODO para ganancias -->


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            
                            <!-- TODO footer para ganancias -->
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