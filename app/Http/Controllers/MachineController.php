<?php

namespace App\Http\Controllers;

use App\Factory;
use App\Machine;
use App\Machinecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MachineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        if (Auth::user()->can('machine')) {
            $machines = Machine::paginate(10);
            return view('machine.list', compact('machines'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('machine')) {
            $factories = Factory::all();
            $machineCategories = Machinecategory::all();
            return view('machine.create', compact('machineCategories', 'factories'));
        } else {
            abort(403);
        }
    }


    public function index()
    {
        //
    }





    public function store(Request $request)
    {
        //
    }


    public function show(Machine $machine)
    {
        //
    }


    public function edit(Machine $machine)
    {
        //
    }


    public function update(Request $request, Machine $machine)
    {
        //
    }


    public function destroy(Machine $machine)
    {
        //
    }
}
