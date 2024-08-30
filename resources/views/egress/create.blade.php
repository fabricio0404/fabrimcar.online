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
                            <h5 class="card-title">Nuevo Egreso</h5>

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
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('egressStore') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="egress">Egreso:</label>
                                            <input type="number" class="form-control" name="egress" id="egress"
                                                placeholder="Ingresa un monto" value="{{ old('egress') }}"
                                                class="@error('egress') is-invalid @enderror">
                                            @error('egress')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Descripción:</label>
                                            <input type="text" class="form-control" name="description"
                                                id="description" placeholder="Descripción"
                                                value="{{ old('description') }}"
                                                class="@error('description') is-invalid @enderror">
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Categoría:</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Elija categoría</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>   

                                        <div class="form-group">
                                            <label for="account_id">Desde:</label>
                                            <select name="account_id" id="account_id" class="form-control">
                                                <option value="">Elija cuenta</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                @endforeach
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
