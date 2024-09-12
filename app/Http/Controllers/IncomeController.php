<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Egress;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;
use Ramsey\Uuid\Type\Integer;

class IncomeController extends Controller
{
    /**
     * Display for month
     */
    public function index() //Listo ingresos por mes (por omisión)
    {
        $categories = DB::table('categories')->where('type', 'I')->get();

        $incomes = Income::select('*')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfMonth()->format('Y-m-d'),
                    Carbon::now()->endOfMonth()->format('Y-m-d')
                ]
            )
            ->orderBy('created_at', 'desc')
            ->get();

        $total = Income::selectRaw('sum(income) as total')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfMonth()->format('Y-m-d'),
                    Carbon::now()->endOfMonth()->format('Y-m-d')
                ]
            )
            ->get();

        $totalEgress = Egress::selectRaw('sum(egress) as totalEgress')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfMonth()->format('Y-m-d'),
                    Carbon::now()->endOfMonth()->format('Y-m-d')
                ]
            )
            ->get();

        $gain = $total[0]->total - $totalEgress[0]->totalEgress;


        $mesActual = $this->mesActual() . " " . Carbon::now()->startOfMonth()->format('Y');

        return view("income.index", compact("incomes", "categories", "total", "mesActual", "gain"));
    }

    private function mesActual()
    {
        $mesActual = Carbon::now()->month;

        switch ($mesActual) {
            case 12:
                return 'Diciembre';
            case 11:
                return 'Noviembre';
            case 10:
                return 'Octubre';
            case 9:
                return 'Setiembre';
            case 8:
                return 'Agosto';
            case 7:
                return 'Julio';
            case 6:
                return 'Junio';
            case 05:
                return 'Mayo';
            case 4:
                return 'Abril';
            case 03:
                return 'Marzo';
            case 2:
                return 'Febrero';
            case 1:
                return 'Enero';

            default:
                # code...
                break;
        }

    }

    /**
     * Display for day
     */
    public function displayForDay()
    {
        $categories = DB::table('categories')->where('type', 'I')->get();

        $incomes = Income::whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->get();


        $total = Income::selectRaw('sum(income) as total')
            ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->get();

        $totalEgress = Egress::selectRaw('sum(egress) as totalEgress')
            ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->get();


        $gain = $total[0]->total - $totalEgress[0]->totalEgress;

        $mesActual = Carbon::now()->format('d-m-Y'); //TODO aca tengo que cambiar por dia actual

        return view("income.index", compact("incomes", "categories", "total", "mesActual", "gain"));
    }

    /**
     * Display for Week
     */
    public function displayForWeek()
    {
        $categories = DB::table('categories')->where('type', 'I')->get();

        $incomes = Income::select('*')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfWeek()->format('Y-m-d'),
                    Carbon::now()->endOfWeek()->format('Y-m-d')
                ]
            )
            ->orderBy('created_at', 'desc')
            ->get();


        $total = Income::selectRaw('sum(income) as total')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfWeek()->format('Y-m-d'),
                    Carbon::now()->endOfWeek()->format('Y-m-d')
                ]
            )
            ->get();

        $totalEgress = Egress::selectRaw('sum(egress) as totalEgress')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfWeek()->format('Y-m-d'),
                    Carbon::now()->endOfWeek()->format('Y-m-d')
                ]
            )
            ->get();

        $mesActual = "Semana " . Carbon::now()->startOfWeek()->format('d-m-Y') . " hasta " . Carbon::now()->endOfWeek()->format('d-m-Y');

        $gain = $total[0]->total - $totalEgress[0]->totalEgress;

        return view("income.index", compact("incomes", "categories", "total", "mesActual", "gain"));

    }

    /**
     * Display for Year
     */
    public function displayForYear()
    {
        $categories = DB::table('categories')->where('type', 'I')->get();

        $incomes = Income::select('*')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfYear()->format('Y-m-d'),
                    Carbon::now()->endOfYear()->format('Y-m-d')
                ]
            )
            ->orderBy('created_at', 'desc')
            ->get();

        $total = Income::selectRaw('sum(income) as total')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfYear()->format('Y-m-d'),
                    Carbon::now()->endOfYear()->format('Y-m-d')
                ]
            )
            ->get();

        $totalEgress = Egress::selectRaw('sum(egress) as totalEgress')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfYear()->format('Y-m-d'),
                    Carbon::now()->endOfYear()->format('Y-m-d')
                ]
            )
            ->get();

        $gain = $total[0]->total - $totalEgress[0]->totalEgress;

        $mesActual = "Año " . Carbon::now()->format('Y');

        return view("income.index", compact("incomes", "categories", "total", "mesActual", "gain"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->where('type', 'I')->get();
        $accounts = Account::all();

        return view("income.create", compact("categories", "accounts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        $data = $request->validated();

        // Crear el ingreso
        $income = Income::create([
            'income' => $data['income'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'account_id' => $data['account_id'],
        ]);

        // Actualizar saldo de la cuenta
        $income->account->increment('saldo', $data['income']);

        // Redirigir a la ruta de ingresos
        return redirect()->route('incomesForDay');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view('income.show', ['income' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Income $income)
    // {
    //     $income->delete();

    //     $account = Account::where('id', $income->account_id)->first();
    //     $account->saldo -= $income->income;
    //     $account->save();

    //     return redirect('/incomes');
    // }

    public function destroy(Income $income)
    {
        DB::transaction(function () use ($income) {
            $account = $income->account; // Cargar la relación account

            // Actualizar saldo de la cuenta
            $account->saldo -= $income->income;
            $account->save();

            // Eliminar el egreso
            $income->delete();
        });

        // Redirigir a la página de egresos después de la transacción exitosa
        return redirect('/incomesForDay');
    }
}