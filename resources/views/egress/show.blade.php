@include('header')
@include('styles')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Egress id: {{ $egress->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Egress</li>
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
                            <h3 class="card-title">Egress: {{ $egress->id }}</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="chart-legend clearfix">
                                        <ul class="chart-legend clearfix">
                                            <li style="font-size: 200%">${{ $egress->egress }}</i>
                                        </ul>
                                        <ul class="chart-legend clearfix">
                                            <li style="font-family: cursive">Descripción: {{ $egress->description }}
                                            </li>
                                        </ul>
                                        <ul class="chart-legend clearfix">
                                            <li style="font-family: cursive">Categoría:
                                                {{ $egress->category->name }}</li>
                                        </ul>
                                        <ul class="chart-legend clearfix">
                                            <li style="font-family: cursive">Cuenta: {{ $egress->account->name }}
                                            </li>
                                        </ul>
                                        <ul class="chart-legend clearfix">
                                            <li style="font-family: cursive">Fecha:
                                                {{ $egress->created_at->format('d/m/Y') }}</li>
                                        </ul>

                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        {{--  editar registro  --}}
                                        <a href="{{ route('egressEdit', $egress->id) }}"
                                            class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt text-white"></i></a>
                                        {{--  eliminar registro  --}}
                                        <a class="btn btn-danger btn-sm" <a class="btn btn-danger btn-sm"
                                            onclick="return confirm('Esta seguro que desea eliminar: {{ $egress->description }}?')"
                                            href="{{ route('egressDelete', $egress->id) }}"><i
                                                class="fas fa-trash-alt text-white"></i></a>
                                    </ul>
                                    <ul class="chart-legend clearfix">
                                        <a href="{{ route('egresses') }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-arrow-left"></i> Volver</a>
                                    </ul>

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
