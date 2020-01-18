<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function list()
    {
        if (Auth::user()->can('product')) {
            $products = Product::paginate(10);
            return view('product.list', compact('products'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('product')) {
            $datalist['name'] = DB::select(DB::raw('SELECT name FROM products GROUP BY name'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM products GROUP BY type'));
            return view('product.create', compact('datalist'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('product')) {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'plys' => 'required',
                'meshSize' => 'required|min:0',
                'depth' => 'required|min:0',
                'twinSize' => 'required|min:0',
                'twistType' => 'required',
                'twistCondition' => 'required',
                'minimumStorage' => 'required|min:0',
            ]);
            $p = new Product;
            $p->name = $request->name;
            $p->type = $request->type;
            if ($request->filled('sizeDenier')) {
                $request->validate([
                    'sizeDenier' => 'min:0',
                ]);
                $p->size_denier = $request->sizeDenier;
            }
            if ($request->filled('sizeMm')) {
                $request->validate([
                    'sizeMm' => 'min:0',
                ]);
                $p->size_mm = $request->sizeMm;
            }
            $p->plys = $request->plys;
            $p->mesh_size = $request->meshSize;
            $p->depth = $request->depth;
            $p->twin_size = $request->twinSize;
            $p->twist_type = $request->twistType;
            $p->twist_condition = $request->twistCondition;
            $p->minimum_storage = $request->minimumStorage;
            $p->save();
            Session::flash('Success', "The Product has been created successfully.");
            return redirect()->route('product.list');
        } else {
            abort(403);
        }
    }


    public function edit($pid)
    {
        if (Auth::user()->can('product')) {
            $pedit = Product::find($pid);
            $datalist['name'] = DB::select(DB::raw('SELECT name FROM products GROUP BY name'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM products GROUP BY type'));
            return view('product.edit', compact('datalist', 'pedit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $pid)
    {
        if (Auth::user()->can('product')) {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'plys' => 'required',
                'meshSize' => 'required|min:0',
                'depth' => 'required|min:0',
                'twinSize' => 'required|min:0',
                'twistType' => 'required',
                'twistCondition' => 'required',
                'minimumStorage' => 'required|min:0',
            ]);
            $p = Product::find($pid);
            $p->name = $request->name;
            $p->type = $request->type;
            if ($request->filled('sizeDenier')) {
                $request->validate([
                    'sizeDenier' => 'min:0',
                ]);
                $p->size_denier = $request->sizeDenier;
                $p->size_mm = null;
            }
            if ($request->filled('sizeMm')) {
                $request->validate([
                    'sizeMm' => 'min:0',
                ]);
                $p->size_mm = $request->sizeMm;
                $p->size_denier = null;
            }
            $p->plys = $request->plys;
            $p->mesh_size = $request->meshSize;
            $p->depth = $request->depth;
            $p->twin_size = $request->twinSize;
            $p->twist_type = $request->twistType;
            $p->twist_condition = $request->twistCondition;
            $p->minimum_storage = $request->minimumStorage;
            $p->update();
            Session::flash('Success', "The Product has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($pid)
    {
        if (Auth::user()->can('product')) {
            Product::find($pid)->delete();
            Session::flash('Success', "The Product has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }
}
