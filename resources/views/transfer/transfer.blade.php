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
                            <h5 class="card-title">Nueva Transferencia:</h5>

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
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('storeTransfer') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="from">Desde:</label>
                                            <select name="from" id="from" class="form-control">
                                                <option value="">Elija cuenta</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->name }}">{{ $account->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="to">Hacia:</label>
                                            <select name="to" id="to" class="form-control">
                                                <option value="">Cuenta destino</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->name }}">{{ $account->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label for="ammount">Monto a transferir:</label>
                                            <input type="number" class="form-control" name="ammount" id="ammount"
                                                placeholder="Ingrese monto a transferir" value="{{ old('ammount') }}"
                                                class="@error('ammount') is-invalid @enderror">
                                            @error('ammount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="comment">Comentario (concepto):</label>
                                            <input type="text" class="form-control" name="comment" id="comment"
                                                placeholder="Ingresa un comentario" value="{{ old('comment') }}"
                                                class="@error('comment') is-invalid @enderror">
                                            @error('comment')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Transferir</button>

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
