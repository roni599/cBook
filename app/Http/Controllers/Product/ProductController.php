<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_unit' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->unit = $request->product_unit;
        $product->user_id = $request->user_id;
        $product->company_id = $request->company_id;
        $product->save();
        return response()->json(["message" => "product Created successfully"]);
    }

    public function company_products($id){
        $product=Product::with(['company'])->where('company_id',$id)->get();
        return response()->json($product);
    }
}
