<?php

namespace App\Http\Controllers;

use App\Customerproductdiscount;
use App\Product;
use App\Productname;
use App\Producttype;
use App\Rawmaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function list(Request $request)
    {
        if (Auth::user()->can('product')) {
            if ($request->ptid){
                $products = Product::Where('identification', 'LIKE', "%{$request->identity}%")
                    ->Where('producttype_id', 'LIKE', "$request->ptid")
                    ->Where('name', 'LIKE', "%{$request->name}%")
                    ->paginate(10);
            }else {
                $products = Product::Where('identification', 'LIKE', "%{$request->identity}%")
                    ->Where('name', 'LIKE', "%{$request->name}%")
                    ->paginate(10);
            }
            foreach ($products as $p){
                $p['type'] = Producttype::find($p->producttype_id)->name;
            }
            if ($request->ptid){
                $products->appends(['identity' => "$request->identity", 'ptid' => "$request->ptid", 'name' => "$request->name"]);
            } else {
                $products->appends(['identity' => "$request->identity", 'name' => "$request->name"]);
            }
            $producttypes = Producttype::all();
            $query = $request->all();
            if ((count($query) > 0) && array_key_exists("ptid", $query)){
                $query['ptname'] = Producttype::find($query['ptid'])->name;
            }
            return view('product.list', compact('products', 'query', 'producttypes'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('product')) {
            $pts = Producttype::all();
            $pns = Productname::all();
            return view('product.create', compact('pts', 'pns'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('product')) {
            $request->validate([
                'identification' => 'required',
                'type' => 'required',
                'name' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $p = new Product;
            $p->identification = $request->identification;
            $p->producttype_id = $request->type;
            $p->name = $request->name;
            $p->minimum_storage = $request->minimumStorage;
            $p->unit = $request->unit;
            $p->size = $request->size;
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
            if ($request->filled('meshSizeMm')) {
                $request->validate([
                    'meshSizeMm' => 'min:0',
                ]);
                $p->mesh_size_mm = $request->meshSizeMm;
            }
            if ($request->filled('meshSizeInch')) {
                $request->validate([
                    'meshSizeInch' => 'min:0',
                ]);
                $p->mesh_size_inch = $request->meshSizeInch;
            }
            if ($request->filled('depth')) {
                $request->validate([
                    'depth' => 'min:0',
                ]);
                $p->depth = $request->depth;
            }
            if ($request->filled('twinSizeDenier')) {
                $request->validate([
                    'twinSizeDenier' => 'min:0',
                ]);
                $p->twin_size_denier = $request->twinSizeDenier;
            }
            if ($request->filled('twinSizePly')) {
                $request->validate([
                    'twinSizePly' => 'min:0',
                ]);
                $p->twin_size_ply = $request->twinSizePly;
            }
            if ($request->filled('twinSizeNo')) {
                $request->validate([
                    'twinSizeNo' => 'min:0',
                ]);
                $p->twin_size_no = $request->twinSizeNo;
            }
            if ($request->filled('twinSizeMm')) {
                $request->validate([
                    'twinSizeMm' => 'min:0',
                ]);
                $p->twin_size_mm = $request->twinSizeMm;
            }
            if ($request->filled('length')) {
                $request->validate([
                    'length' => 'min:0',
                ]);
                $p->length = $request->length;
            }
            if ($request->filled('weight')) {
                $request->validate([
                    'weight' => 'min:0',
                ]);
                $p->weight = $request->weight;
            }
            if ($request->filled('framneNo')) {
                $request->validate([
                    'framneNo' => 'min:0',
                ]);
                $p->frame_no = $request->framneNo;
            }
            if ($request->filled('frameSizeWidth')) {
                $request->validate([
                    'frameSizeWidth' => 'min:0',
                ]);
                $p->frame_size_width = $request->frameSizeWidth;
            }
            if ($request->filled('frameSizeHeight')) {
                $request->validate([
                    'frameSizeHeight' => 'min:0',
                ]);
                $p->frame_size_height = $request->frameSizeHeight;
            }
            if ($request->filled('bodyCm')) {
                $request->validate([
                    'bodyCm' => 'min:0',
                ]);
                $p->body_cm = $request->bodyCm;
            }
            if ($request->filled('bodyPly')) {
                $request->validate([
                    'bodyPly' => 'min:0',
                ]);
                $p->body_ply = $request->bodyPly;
            }
            if ($request->filled('tailCm')) {
                $request->validate([
                    'tailCm' => 'min:0',
                ]);
                $p->tail_cm = $request->tailCm;
            }
            if ($request->filled('tailPly')) {
                $request->validate([
                    'tailPly' => 'min:0',
                ]);
                $p->tail_ply = $request->tailPly;
            }
            if ($request->filled('strand')) {
                $p->strand = $request->strand;
            }
            $p->coil_type = $request->coilType;
            $p->dropper = $request->dropper;
            $p->grade_no = $request->gradeNo;
            $p->mfi = $request->mfi;
            $p->mfr = $request->mfr;
            $p->melting_point = $request->meltingPoint;
            $p->density = $request->density;
            if ($request->hasFile('uploadTds')){
                $img = $request->uploadTds;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Products/TDS', $img_name);
                $d = 'uploads/Products/TDS/' . $img_name;
                $p->upload_tds = $d;
            }
            if ($request->hasFile('uploadMsds')){
                $img = $request->uploadMsds;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Products/MSDS', $img_name);
                $d = 'uploads/Products/MSDS/' . $img_name;
                $p->upload_msds = $d;
            }
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
            $pedit['type'] = Producttype::find($pedit->producttype_id)->display_name;
            $rawMaterial = $pedit->rawMaterials()->get();
            $allRawMaterials = Rawmaterial::all();
            $pdn = null;
            if (($pedit->producttype_id * 1) < 6){
                $pdn = Productname::where('name', $pedit->name)->first()->display_name;
            }
            return view('product.edit', compact('pedit', 'rawMaterial', 'allRawMaterials', 'pdn'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $pid)
    {
        if (Auth::user()->can('product')) {
            $request->validate([
                'identification' => 'required',
                'type' => 'required',
                'name' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $p = Product::find($pid);
            $p->identification = $request->identification;
            $p->producttype_id = $request->type;
            $p->name = $request->name;
            $p->minimum_storage = $request->minimumStorage;
            $p->unit = $request->unit;
            $p->size = $request->size;
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
            if ($request->filled('meshSizeMm')) {
                $request->validate([
                    'meshSizeMm' => 'min:0',
                ]);
                $p->mesh_size_mm = $request->meshSizeMm;
            }
            if ($request->filled('meshSizeInch')) {
                $request->validate([
                    'meshSizeInch' => 'min:0',
                ]);
                $p->mesh_size_inch = $request->meshSizeInch;
            }
            if ($request->filled('depth')) {
                $request->validate([
                    'depth' => 'min:0',
                ]);
                $p->depth = $request->depth;
            }
            if ($request->filled('twinSizeDenier')) {
                $request->validate([
                    'twinSizeDenier' => 'min:0',
                ]);
                $p->twin_size_denier = $request->twinSizeDenier;
            }
            if ($request->filled('twinSizePly')) {
                $request->validate([
                    'twinSizePly' => 'min:0',
                ]);
                $p->twin_size_ply = $request->twinSizePly;
            }
            if ($request->filled('twinSizeNo')) {
                $request->validate([
                    'twinSizeNo' => 'min:0',
                ]);
                $p->twin_size_no = $request->twinSizeNo;
            }
            if ($request->filled('twinSizeMm')) {
                $request->validate([
                    'twinSizeMm' => 'min:0',
                ]);
                $p->twin_size_mm = $request->twinSizeMm;
            }
            if ($request->filled('length')) {
                $request->validate([
                    'length' => 'min:0',
                ]);
                $p->length = $request->length;
            }
            if ($request->filled('weight')) {
                $request->validate([
                    'weight' => 'min:0',
                ]);
                $p->weight = $request->weight;
            }
            if ($request->filled('framneNo')) {
                $request->validate([
                    'framneNo' => 'min:0',
                ]);
                $p->frame_no = $request->framneNo;
            }
            if ($request->filled('frameSizeWidth')) {
                $request->validate([
                    'frameSizeWidth' => 'min:0',
                ]);
                $p->frame_size_width = $request->frameSizeWidth;
            }
            if ($request->filled('frameSizeHeight')) {
                $request->validate([
                    'frameSizeHeight' => 'min:0',
                ]);
                $p->frame_size_height = $request->frameSizeHeight;
            }
            if ($request->filled('bodyCm')) {
                $request->validate([
                    'bodyCm' => 'min:0',
                ]);
                $p->body_cm = $request->bodyCm;
            }
            if ($request->filled('bodyPly')) {
                $request->validate([
                    'bodyPly' => 'min:0',
                ]);
                $p->body_ply = $request->bodyPly;
            }
            if ($request->filled('tailCm')) {
                $request->validate([
                    'tailCm' => 'min:0',
                ]);
                $p->tail_cm = $request->tailCm;
            }
            if ($request->filled('tailPly')) {
                $request->validate([
                    'tailPly' => 'min:0',
                ]);
                $p->tail_ply = $request->tailPly;
            }
            if ($request->filled('strand')) {
                $p->strand = $request->strand;
            }
            $p->coil_type = $request->coilType;
            $p->dropper = $request->dropper;
            $p->grade_no = $request->gradeNo;
            $p->mfi = $request->mfi;
            $p->mfr = $request->mfr;
            $p->melting_point = $request->meltingPoint;
            $p->density = $request->density;
            if ($request->hasFile('uploadTds')){
                if ($p->upload_tds){
                    unlink($p->upload_tds);
                }
                $img = $request->uploadTds;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Products/TDS', $img_name);
                $d = 'uploads/Products/TDS/' . $img_name;
                $p->upload_tds = $d;
            }
            if ($request->hasFile('uploadMsds')){
                if ($p->upload_msds){
                    unlink($p->upload_msds);
                }
                $img = $request->uploadMsds;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Products/MSDS', $img_name);
                $d = 'uploads/Products/MSDS/' . $img_name;
                $p->upload_msds = $d;
            }
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
