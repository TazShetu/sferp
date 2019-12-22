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
//            session()->forget('mcid');
            $factories = Factory::all();
            $machineCategories = Machinecategory::all();
            return view('machine.create', compact('machineCategories', 'factories'));
        } else {
            abort(403);
        }
    }



    public function store(Request $request, $mcid)
    {
        if (Auth::user()->can('machine')) {
            if (($mcid * 1) == 1){
                // Fishing Net Machine

            }elseif (($mcid * 1) == 2){
                // Rope Making Machine
                session(['mcid' => 2]);
                $request->validate([
                    'manufacturerName' => 'required',
                    'typeOrModelNumber' => 'required',
                    'manufacturerYear' => 'required',
                    'ropeSizeStart' => 'required',
                    'ropeSizeEnd' => 'required',
                    'factory' => 'required',
                ]);



                // delete session
                // redirect back to list page
            }elseif (($mcid * 1) == 3){
                // Twisting Machine

            }elseif (($mcid * 1) == 4){
                // Extruder

            }
        } else {
            abort(403);
        }
    }



    public function index()
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
