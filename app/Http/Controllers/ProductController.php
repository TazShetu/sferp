<?php

namespace App\Http\Controllers;

use App\Customerproductdiscount;
use App\Product;
use App\Rawmaterial;
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
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM products GROUP BY unit'));
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
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
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
            if ($request->filled('plys')) {
                $p->plys = $request->plys;
            }
            if ($request->filled('meshSize')) {
                $request->validate([
                    'meshSize' => 'min:0',
                ]);
                $p->mesh_size = $request->meshSize;
            }
            if ($request->filled('depth')) {
                $request->validate([
                    'depth' => 'min:0',
                ]);
                $p->depth = $request->depth;
            }
            if ($request->filled('twinSize')) {
                $request->validate([
                    'twinSize' => 'min:0',
                ]);
                $p->twin_size = $request->twinSize;
            }
            if ($request->filled('twistType')) {
                $p->twist_type = $request->twistType;
            }
            if ($request->filled('twistCondition')) {
                $p->twist_condition = $request->twistCondition;
            }
            if ($request->filled('strand')) {
                $p->strand = $request->strand;
            }
            $p->minimum_storage = $request->minimumStorage;
            $p->unit = $request->unit;
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
            $rawMaterial = $pedit->rawMaterials()->get();
            $allRawMaterials = Rawmaterial::all();
            $datalist['name'] = DB::select(DB::raw('SELECT name FROM products GROUP BY name'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM products GROUP BY type'));
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM products GROUP BY unit'));
            return view('product.edit', compact('datalist', 'pedit', 'rawMaterial', 'allRawMaterials'));
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
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
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
            if ($request->filled('plys')) {
                $p->plys = $request->plys;
            }
            if ($request->filled('meshSize')) {
                $request->validate([
                    'meshSize' => 'min:0',
                ]);
                $p->mesh_size = $request->meshSize;
            }
            if ($request->filled('depth')) {
                $request->validate([
                    'depth' => 'min:0',
                ]);
                $p->depth = $request->depth;
            }
            if ($request->filled('twinSize')) {
                $request->validate([
                    'twinSize' => 'min:0',
                ]);
                $p->twin_size = $request->twinSize;
            }
            if ($request->filled('twistType')) {
                $p->twist_type = $request->twistType;
            }
            if ($request->filled('twistCondition')) {
                $p->twist_condition = $request->twistCondition;
            }
            if ($request->filled('strand')) {
                $p->strand = $request->strand;
            }
            $p->minimum_storage = $request->minimumStorage;
            $p->unit = $request->unit;
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
            DB::beginTransaction();
            try {
                $p = Product::find($pid);
                $p->rawMaterials()->detach();
                $p->delete();
                Customerproductdiscount::where('product_id', $pid)->delete();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Product has been deleted successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function updateProductRawmaterial(Request $request, $pid)
    {
        if (Auth::user()->can('product')) {
            $product = Product::find($pid);
            if ($request->filled('rawMaterial')){
                $rawMaterials = array_unique($request->rawMaterial);
                $product->rawMaterials()->sync($rawMaterials);
            } else {
                $product->rawMaterials()->detach();
            }
            Session::flash('Success', "The Product has been successfully updated with raw material.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


}
