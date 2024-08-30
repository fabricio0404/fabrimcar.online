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
                        <li class="breadcrumb-item active">Incomes</li>
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

                <div class="col-md-8">
                    <!-- /.info-box -->

                    <div class="card">

                        <div class="card-header" style="display: flex; align-items: center; justify-content: center;">

                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomesForDay') }}"
                                        class="@if (request()->is('incomesForDay') ||
                                                request()->is('incomesForWeek') ||
                                                request()->is('incomes') ||
                                                request()->is('incomesForYear')) active @endif">Ingresos</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('egressesForDay') }}"
                                        class="@if (request()->is('egressesForDay')) active @endif">Egresos</a>
                                </ul>
                            </div>

                        </div>

                        <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                            <h3 class="card-title" style="flex: 1;">Ingresos: {{ $mesActual }}</h3>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomesForDay') }}"
                                        class="@if (request()->is('incomesForDay')) active @endif">Hoy</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomesForWeek') }}"
                                        class="@if (request()->is('incomesForWeek')) active @endif">Semana</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomes') }}"
                                        class="@if (request()->is('incomes')) active @endif">Mes</a>
                                </ul>
                            </div>
                            <div class="col-md-4" style="flex: 1;">
                                <ul class="chart-legend clearfix">
                                    <a href="{{ route('incomesForYear') }}"
                                        class="@if (request()->is('incomesForYear')) active @endif">Año</a>
                                </ul>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="chart-legend clearfix">
                                        <a href="{{ route('incomeCreate') }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-plus text-white"></i> Nuevo Ingreso</a>
                                    </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <ul class="nav nav-pills flex-column">
                                @if (count($incomes) != 0)
                                    @foreach ($incomes as $income)
                                        <li class="nav-item">
                                            <a href="{{ route('incomeShow', $income->id) }}"
                                                class="nav-link d-flex justify-content-between align-items-center">

                                                <div class="income-details text-{{ $income->category->icon }}">
                                                    <span
                                                        class="income-date">{{ $income->created_at->format('d/m/Y') }}</span>
                                                    <span class="income-description">{{ $income->description }}</span>
                                                    <span class="income-category">{{ $income->category->name }}</span>
                                                    {{--  <span class="income-account">{{ $income->account->name }}</span>  --}}
                                                </div>

                                                <div class="income-amount text-{{ $income->category->icon }}">
                                                    ${{ number_format($income->income, 2) }}
                                                </div>

                                            </a>
                                        </li>
                                    @endforeach
                        </div>
                        <div class="card-footer p-0 font-italic font-weight-bold">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item" style="font-size: 120%">
                                    <a href="#" class="nav-link">
                                        <span class="float-right text-white">Total:
                                            ${{ $total[0]->total }}</span>
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

<style>
    .income-details {
        display: flex;
        flex-direction: column;
    }

    .income-date,
    .income-description,
    .income-category,
    .income-account {
        display: block;
        margin-bottom: 4px;
        /* Espaciado uniforme entre elementos */
    }

    .income-amount {
        font-weight: bold;
        font-size: 1.1em;
        /* Un poco más grande para destacar */
    }
</style>
