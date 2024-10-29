<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::all();
        return response()->json($purchase);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'company_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'customer_name' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'grandTotal' => 'required|numeric',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer',
            'items.*.itemName' => 'required|string|max:255',
            'items.*.qty' => 'required|integer',
            'items.*.unit' => 'required|string|max:10',
            'items.*.price' => 'required|numeric',
            'items.*.total' => 'required|numeric',
        ]);



        // Create order items
        // foreach ($request['items'] as $item) {
        //     Purchase::create([
        //         'user_id' => $request['user_id'],
        //         'company_id' => $request['company_id'],
        //         'customer_id' => $request['customer_id'],
        //         'customer_name' => $request['customer_name'],
        //         'payment_type' => $request['payment_type'],
        //         'grand_total' => $request['grandTotal'],
        //         'product_id' => $item['product_id'],
        //         'product_name' => $item['itemName'],
        //         'quantity' => $item['qty'],
        //         'unit' => $item['unit'],
        //         'price' => $item['price'],
        //         'total' => $item['total'],
        //     ]);
        // }

        foreach ($request['items'] as $item) {
            Purchase::create([
                'user_id' => $request['user_id'],
                'company_id' => $request['company_id'],
                'customer_id' => $request['customer_id'],
                'customer_name' => $request['customer_name'],
                'payment_type' => $request['payment_type'],
                'grand_total' => $request['grandTotal'],
                'product_id' => $item['product_id'],
                'product_name' => $item['itemName'],
                'quantity' => $item['qty'],
                'unit' => $item['unit'],
                'price' => $item['price'],
                'total' => $item['total'],
            ]);
            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity += $item['qty'];
                $product->save();
            }
        }
        return response()->json(['message' => 'Purchase created successfully.']);
    }
}
