<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEgressRequest;
use App\Models\Account;
use App\Models\Egress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->where('type', 'E')->get();

        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');

        $egresses = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->orderByDesc('created_at')
            ->get();

        $total = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('sum(egress) as total')
            ->get();

        $mesActual = $this->mesActual() . " " . Carbon::now()->startOfMonth()->format('Y');

        return view("egress.index", compact("egresses", "categories", "total", "mesActual"));
    }

    private function mesActual()
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Setiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $mesActual = Carbon::now()->month;

        return $meses[$mesActual];
    }

    /**
     * Display for day
     */
    public function displayForDay()
    {
        $categories = DB::table('categories')->where('type', 'E')->get();

        $currentDate = Carbon::now()->format('Y-m-d');

        $egresses = Egress::whereDate('created_at', $currentDate)
            ->orderByDesc('created_at')
            ->get();

        $total = Egress::whereDate('created_at', $currentDate)
            ->selectRaw('sum(egress) as total')
            ->get();

        $mesActual = Carbon::now()->format('d-m-Y');

        return view("egress.index", compact("egresses", "categories", "total", "mesActual"));
    }

    /**
     * Display for Week
     */
    public function displayForWeek()
    {
        $categories = DB::table('categories')->where('type', 'E')->get();

        $startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endDate = Carbon::now()->endOfWeek()->format('Y-m-d');

        $egresses = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->orderByDesc('created_at')
            ->get();

        $total = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('sum(egress) as total')
            ->get();

        $mesActual = "Semana " . Carbon::now()->startOfWeek()->format('d-m-Y') . " hasta " . Carbon::now()->endOfWeek()->format('d-m-Y');

        return view("egress.index", compact("egresses", "categories", "total", "mesActual"));
    }
    /**
     * Display for Year
     */
    public function displayForYear()
    {
        $categories = DB::table('categories')->where('type', 'E')->get();

        $startDate = Carbon::now()->startOfYear()->format('Y-m-d');
        $endDate = Carbon::now()->endOfYear()->format('Y-m-d');

        $egresses = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->orderByDesc('created_at')
            ->get();

        $total = Egress::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('sum(egress) as total')
            ->get();

        $mesActual = "Año " . Carbon::now()->format('Y');

        return view("egress.index", compact("egresses", "categories", "total", "mesActual"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->where('type', 'E')->get();
        $accounts = Account::all();

        return view('egress.create', compact("categories", "accounts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEgressRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            // Crear el egreso
            $egress = Egress::create([
                'egress' => $data['egress'],
                'description' => $data['description'],
                'category_id' => $data['category_id'],
                'account_id' => $data['account_id'],
            ]);

            // Verificar que el saldo no será negativo
            $newBalance = $egress->account->saldo - $data['egress'];

            if ($newBalance < 0) {
                // Si el saldo resultante es negativo, mostrar un mensaje y deshacer el egreso
                throw new \Exception('El saldo no puede ser negativo.');
            }

            // Actualizar saldo de la cuenta utilizando la relación account
            $egress->account->decrement('saldo', $data['egress']);

            DB::commit();

            // Redirigir a la ruta de egresos
            return redirect()->route('egressesForDay')->with('success', 'Egreso registrado correctamente.');

        } catch (\Exception $e) {
            // Deshacer transacción en caso de error
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Egress $egress)
    {
        return view('egress.show', compact('egress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Egress $egress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Egress $egress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egress $egress)
    {
        DB::transaction(function () use ($egress) {
            $account = $egress->account; // Cargar la relación account

            // Actualizar saldo de la cuenta
            $account->saldo += $egress->egress;
            $account->save();

            // Eliminar el egreso
            $egress->delete();
        });

        // Redirigir a la página de egresos después de la transacción exitosa
        return redirect('/egressesForDay');
    }
}
