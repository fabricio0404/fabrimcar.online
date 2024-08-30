<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Models\Account;
use Carbon\Carbon;
use Psy\Readline\Hoa\Console;

use function Laravel\Prompts\alert;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Listado del mes actual
    {
        $transfers = Transfer::select('*')
        ->whereBetween(
            'created_at',
            [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d')
            ]
        )
        ->orderBy('created_at', 'desc')
        ->get();

        return view('transfer.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransferRequest $request)
    {
        $data = $request->validated();

        //Modifica valores en saldos de cuentas
        $from = Account::where('name', $request->from)->first();
        $from->saldo -= $data['ammount'];
        $from->save();

        $to = Account::where('name', $request->to)->first();
        $to->saldo += $data['ammount'];
        $to->save();


        // dd($from->saldo);
        // dump($data['ammount']);

        Transfer::create([
            'from' => $data['from'],
            'to' => $data['to'],
            'ammount' => $data['ammount'],
            'comment' => $data['comment'],

        ]);    
        
        return redirect()->route('accounts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    public function transfer(){
        $accounts = Account::all();

        return view('transfer.transfer', compact('accounts'));


    }
}
