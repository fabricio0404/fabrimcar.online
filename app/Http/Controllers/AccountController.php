<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        
        return view('account.create', compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $data = $request->validated();

        Account::create([
            'name' => $data['name'],
            'saldo' => $data['saldo'],
            'user_id' => $data['user_id'],
        ]);
        return redirect()->route('accounts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->back();
    }

}
