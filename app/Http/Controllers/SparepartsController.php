<?php

namespace App\Http\Controllers;

use App\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        if (Auth::user()->can('spare_parts')) {
            $spareParts = Spareparts::paginate(10);

            return view('spareParts.list', compact('spareParts'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('spare_parts')) {
           return view('spareParts.create');
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


    public function show(Spareparts $spareparts)
    {
        //
    }


    public function edit(Spareparts $spareparts)
    {
        //
    }


    public function update(Request $request, Spareparts $spareparts)
    {
        //
    }


    public function destroy(Spareparts $spareparts)
    {
        //
    }
}
