<?php

namespace App\Http\Controllers;

use App\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FactoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        if (Auth::user()->can('factory')) {
            $factories = Factory::all();
            return view('factory.list', compact('factories'));
        } else {
            abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->can('factory')) {
            return view('factory.create');
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('factory')) {
            $request->validate([
                'name' => 'required',
                'code' => 'required',
                'address' => 'required',
                'establishedDate' => 'required',
            ]);
            $factory = new Factory;
            $factory->name = $request->name;
            $factory->code = $request->code;
            $factory->address = $request->address;
            $factory->established_date =  date('Y-m-d',strtotime($request->establishedDate));
            if ($request->hasFile('image')){
                $img = $request->image;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Factories/Image', $img_name);
                $d = 'uploads/Factories/Image/' . $img_name;
                $factory->image = $d;
            }
            $factory->save();
            Session::flash('Success', "The Factory has been created successfully.");
            return redirect()->route('factory.list');
        } else {
            abort(403);
        }
    }


    public function edit($fid)
    {
        if (Auth::user()->can('factory')) {
            $fedit = Factory::find($fid);
            return view('factory.edit', compact('fedit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $fid)
    {
        if (Auth::user()->can('factory')) {
            $request->validate([
                'name' => 'required',
                'code' => 'required',
                'address' => 'required',
                'establishedDate' => 'required',
            ]);
            $factory = Factory::find($fid);
            $factory->name = $request->name;
            $factory->code = $request->code;
            $factory->address = $request->address;
            $factory->established_date =  date('Y-m-d',strtotime($request->establishedDate));
            if ($request->hasFile('image')){
                if ($factory->image){
                    unlink($factory->image);
                }
                $img = $request->image;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Factories/Image', $img_name);
                $d = 'uploads/Factories/Image/' . $img_name;
                $factory->image = $d;
            }
            $factory->update();
            Session::flash('Success', "The Factory has been updated successfully.");
            return redirect()->route('factory.list');
        } else {
            abort(403);
        }
    }



    public function destroy($fid)
    {
        if (Auth::user()->can('factory')) {
            //check all dependencyes first ///////////////////
            $factory = Factory::find($fid);
            if ($factory->image){
                unlink($factory->image);
            }
            $factory->delete();
            Session::flash('Success', "The Factory has been deleted successfully.");
            return redirect()->route('factory.list');
        } else {
            abort(403);
        }
    }



}
