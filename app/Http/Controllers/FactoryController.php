<?php

namespace App\Http\Controllers;

use App\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FactoryController extends Controller
{

    public function list()
    {
        $factories = Factory::all();
        return view('factory.list', compact('factories'));
    }

//    public function create()
//    {
//        return view('factory.create');
//    }


    public function store(Request $request)
    {
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
        $factory->established_date = date('Y-m-d', strtotime($request->establishedDate));
        if ($request->hasFile('image')) {
            $img = $request->image;
            $img_name = time() . $img->getClientOriginalName();
            $img->move('uploads/Factories/Image', $img_name);
            $d = 'uploads/Factories/Image/' . $img_name;
            $factory->image = $d;
        }
        $factory->save();
        Session::flash('Success', "The Factory has been created successfully.");
        return redirect()->route('factory.list');
    }


    public function edit($fid)
    {
        $fedit = Factory::find($fid);
        return view('factory.edit', compact('fedit'));
    }


    public function update(Request $request, $fid)
    {
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
        $factory->established_date = date('Y-m-d', strtotime($request->establishedDate));
        if ($request->hasFile('image')) {
            if ($factory->image) {
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
    }


    public function destroy($fid)
    {
        //check all dependencyes first ///////////////////////////////////////////////////
        $factory = Factory::find($fid);
        if ($factory->image) {
            unlink($factory->image);
        }
        $factory->delete();
        Session::flash('Success', "The Factory has been deleted successfully.");
        return redirect()->route('factory.list');
    }


}
