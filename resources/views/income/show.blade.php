@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Income id: {{ $income->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Egresses</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">

                <div class="col-md-3">
                    <!-- /.info-box -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Income id: {{ $income->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <!-- /.col -->
                                <div class="col-md-8">
                                    <ul class="chart-legend clearfix">
                                        <li style="font-size: 200%">${{ $income->income }}</i>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <li style="font-family: cursive">Descripción: {{ $income->description }}</li>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <li style="font-family: cursive">Categoría: {{ $income->category->name }}</li>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <li style="font-family: cursive">Cuenta: {{ $income->account->name }}</li>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <li style="font-family: cursive">Fecha:
                                            {{ $income->created_at->format('d/m/Y') }}</li>
                                    </ul>

                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        {{--  editar registro  --}}
                                        <a href="{{ route('incomeEdit', $income->id) }}"
                                            class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt text-white"></i></a>
                                        {{--  eliminar registro  --}}
                                        <a class="btn btn-danger btn-sm" <a class="btn btn-danger btn-sm"
                                            onclick="return confirm('Esta seguro que desea eliminar este ingreso? id: {{ $income->id }}')"
                                            href="{{ route('incomeDelete', $income->id, $income->income) }}"><i
                                                class="fas fa-trash-alt text-white"></i></a>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <a href="{{ route('incomes') }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-arrow-left"></i> Volver</a>
                                    </ul>
                                </div>
                                <div class="col-md-8">

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">


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
