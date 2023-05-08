<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return response()->json(Account::all());
    }

    public function store(Request $request)
    {
        Account::create([
            'account' => $request->account
        ]);
        return response()->json(['msg' => 'success']);
    }

    public function delete(Account $account)
    {
        $account->delete();
        return response()->json(['msg' => 'success']);
    }

    public function restore(Account $account)
    {
        $account->restore();
        return response()->json($account);
    }

    public function forceDelete(Account $account)
    {
        $account->forceDelete();
        return response()->json(['msg' => 'success']);
    }
}
