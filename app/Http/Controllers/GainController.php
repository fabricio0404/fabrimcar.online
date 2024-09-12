<?php

namespace App\Http\Controllers;

use App\Models\Gain;
use App\Models\Income;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //default por mes

        $incomes = Income::selectRaw('sum(income) as total')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfMonth()->format('Y-m-d'),
                    Carbon::now()->endOfMonth()->format('Y-m-d')
                ]
            )
            ->get();

        $egresses = Income::selectRaw('sum(egress) as total')
            ->whereBetween(
                'created_at',
                [
                    Carbon::now()->startOfMonth()->format('Y-m-d'),
                    Carbon::now()->endOfMonth()->format('Y-m-d')
                ]
            )
            ->get();

            


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gain $gain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gain $gain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gain $gain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gain $gain)
    {
        //
    }
}
