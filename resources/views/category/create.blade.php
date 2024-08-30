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
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Nueva Catagoría</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('categorySave') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name">Nombre:</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Ingresa un nombre de categoría" value="{{ old('name') }}"
                                                class="@error('name') is-invalid @enderror">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="type">Tipo:</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">Elija tipor de categoría</option>
                                                <option value="I">Ingresos</option>
                                                <option value="E">Egresos</option>
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="icon">Icono:</label>
                                            <select name="icon" id="icon" class="form-control">
                                                <option value="">Elija un ícono para la categoría</option>
                                                <option value="danger">danger</option>
                                                <option value="success">success</option>
                                                <option value="warning">warning</option>
                                                <option value="info">info</option>
                                                <option value="primary">primary</option>
                                                <option value="secondary">secondary</option>
                                                
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">

                            </div>
                            <!-- /.row -->

                            <!-- Main row -->
                            <div class="row">


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
