<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BankaccountController extends Controller
{


    public function list(Request $request)
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        $bankAccount = Bankaccount::where('name', 'LIKE', "%{$request->name}%")->Where('ac_name', 'LIKE', "%{$request->ac_name}%")->Where('ac_number', 'LIKE', "%{$request->ac_number}%")->paginate(10);
        $bankAccount->appends(['name' => "$request->name", 'ac_name' => "$request->ac_name", 'ac_number' => "$request->ac_number"]);
        $query = $request->all();
        return view('bankAccounts.list', compact('bankAccount', 'query'));
    }


    public function create()
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        $datalist['name'] = DB::select(DB::raw('SELECT name FROM bankaccounts GROUP BY name'));
        return view('bankAccounts.create', compact('datalist'));
    }


    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        $request->validate([
            'name' => 'required',
            'ac_name' => 'required',
            'ac_number' => 'required',
        ]);
        $s = new Bankaccount;
        $s->name = $request->name;
        $s->ac_name = $request->ac_name;
        $s->ac_number = $request->ac_number;
        $s->save();
        Session::flash('Success', "The Bank Account has been created successfully.");
        return redirect()->route('bankAccount.list');
    }


    public function destroy($baid)
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        Bankaccount::find($baid)->delete();
        Session::flash('Success', "The bank Account has been deleted successfully.");
        return redirect()->back();
    }


    public function edit($baid)
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        $baedit = Bankaccount::find($baid);
        $datalist['name'] = DB::select(DB::raw('SELECT name FROM bankaccounts GROUP BY name'));
        return view('bankAccounts.edit', compact('baedit', 'datalist'));
    }


    public function update(Request $request, $baid)
    {
        abort_unless(Auth::user()->can('bank_account'), 403);
        $request->validate([
            'name' => 'required',
            'ac_name' => 'required',
            'ac_number' => 'required',
        ]);
        $s = Bankaccount::find($baid);
        $s->name = $request->name;
        $s->ac_name = $request->ac_name;
        $s->ac_number = $request->ac_number;
        $s->update();
        Session::flash('Success', "The Bank Account has been updated successfully.");
        return redirect()->back();
    }


}
