@include('header')


<!-- Aquí continúa el contenido normal de tu vista de egresos -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Egresses</h1>
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

            <!-- Main row -->
            <div class="row">

                <div class="col-md-8">
                    <!-- /.info-box -->

                    <div class="card">
                        
                        <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                            <!-- Left navbar links -->


                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomesForDay') }}" class="@if(request()->is('incomesForDay')) active @endif">Ingresos</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egressesForDay') }}" class="@if(request()->is('egressesForDay') || request()->is('egressesForWeek') || request()->is('egresses') || request()->is('egressesForYear')) active @endif">Egresos</a>
                                </ul>
                            </div>
                    
                        </div>
                            
                        <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                            <h3 class="card-title" style="flex: 1;">Egresos: {{ $mesActual }}</h3>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egressesForDay') }}" class=" @if(request()->is('egressesForDay')) active @endif">Hoy</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egressesForWeek') }}" class=" @if(request()->is('egressesForWeek')) active @endif">Semana</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egresses') }}" class=" @if(request()->is('egresses')) active @endif">Mes</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egressesForYear') }}" class=" @if(request()->is('egressesForYear')) active @endif">Año</a>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="chart-legend clearfix">
                                        <a href="{{ route('egressCreate') }}" class="btn btn-danger btn-sm"><i
                                                class="fas fa-plus text-white"></i> Nuevo Egreso</a>
                                    </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <ul class="nav nav-pills flex-column">
                                @if (count($egresses) != 0)
                                    @foreach ($egresses as $egress)
                                    <li class="nav-item">
                                            <a href="{{ route('egressShow', $egress->id) }}"
                                                class="nav-link d-flex justify-content-between align-items-center">

                                                <div class="income-details text-{{ $egress->category->icon }}">
                                                    <span
                                                        class="income-date">{{ $egress->created_at->format('d/m/Y') }}</span>
                                                    <span class="income-description">{{ $egress->description }}</span>
                                                    <span class="income-category">{{ $egress->category->name }}</span>
                                                    {{--  <span class="income-account">{{ $income->account->name }}</span>  --}}
                                                </div>

                                                <div class="income-amount text-{{ $egress->category->icon }}">
                                                    ${{ number_format($egress->egress, 2) }}
                                                </div>

                                            </a>
                                        

                                            {{--  editar registro  --}}
                                            {{--  <a href="{{ route('egressEdit', $egress->id) }}"
                                            class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt text-white"></i></a>  --}}
                                            {{--  eliminar registro  --}}
                                            {{--  <a class="btn btn-danger btn-sm" <a class="btn btn-danger btn-sm"
                                            onclick="return confirm('Esta seguro que desea eliminar: {{ $egress->description }}?')"
                                            href="{{ route('egressDelete', $egress->id) }}"><i
                                                class="fas fa-trash-alt text-white"></i></a>  --}}
                                        </li>
                                    @endforeach


                        </div>
                        <div class="card-footer p-0 font-italic font-weight-bold">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item" style="font-size: 120%">
                                    <a href="#" class="nav-link">
                                        <span class="float-right text-white">Total: ${{ $total[0]->total }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="card-footer p-0 font-italic font-weight-bold">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <span>No hay registros </span>
                                </li>
                                <li class="nav-item" style="font-size: 120%">
                                    <a href="#" class="nav-link">

                                        <span class="float-right text-white">Total: $0</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        @endif
                        </ul>
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

<style>
    .income-details {
        display: flex;
        flex-direction: column;
    }

    .income-date, .income-description, .income-category, .income-account {
        display: block;
        margin-bottom: 4px; /* Espaciado uniforme entre elementos */
    }

    .income-amount {
        font-weight: bold;
        font-size: 1.1em; /* Un poco más grande para destacar */
    }
</style>
