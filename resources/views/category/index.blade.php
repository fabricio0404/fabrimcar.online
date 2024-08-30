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
                        <li class="breadcrumb-item active">Egresses</li>
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
                            <h3 style="color: red" class="card-title">Categorías de Egresos:</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="chart-legend clearfix">
                                        @foreach ($categoriesE as $categoryE)
                                            <li>
                                                <a href="{{ route('categoriesShow', $categoryE->id) }}"
                                                    class="nav-link">
                                                    <i class="far fa-circle text-{{ $categoryE->icon }}"></i>
                                                    <span class="float-right text-{{ $categoryE->icon }}">
                                                        {{ $categoryE->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                        {{--  <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                                <li><i class="far fa-circle text-success"></i> IE</li>
                                                <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                <li><i class="far fa-circle text-info"></i> Safari</li>
                                                <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                <li><i class="far fa-circle text-secondary"></i> Navigator</li>  --}}

                                    </ul>                                    
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-header">
                            <h3 style="color: green" class="card-title">Categorías de Ingresos:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="chart-legend clearfix">
                                        @foreach ($categoriesI as $categoryI)
                                            <li>
                                                <a href="{{ route('categoriesShow', $categoryI->id) }}"
                                                    class="nav-link">
                                                    <i class="far fa-circle text-{{ $categoryI->icon }}"></i>
                                                    <span class="float-right text-{{ $categoryI->icon }}">
                                                        {{ $categoryI->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->


                        <div class="card-footer p-0">
                            <ul class="nav nav-pills flex-column">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('categoryCreate') }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-plus text-white"></i> Nueva Categoría</a>
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
