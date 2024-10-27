<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return response()->json($supplier);
    }
    public function company_supplier($id)
    {
        $suppliers = Supplier::with(['company'])
            ->where('company_id', $id)
            ->get();
            return response()->json($suppliers);
    }
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255|unique:suppliers,supplier_name',
            'company_id' => 'required',
            'user_id' => 'required',
        ]);
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->company_id = $request->company_id;
        $supplier->user_id = $request->user_id;
        $supplier->save();
        return response()->json(['message' => "Supplier Created Successfully"]);
    }
}
