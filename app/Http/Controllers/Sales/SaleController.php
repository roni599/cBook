<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return response()->json($sales);
    }

    public function sales_products($id)
    {
        $purchase = Sale::where('company_id', $id)->get();
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
        $bill = new Bill();
        $bill->type = 'sale';
        $bill->customer_id = $request->customer_id;
        $bill->company_id = $request->company_id;
        $bill->user_id = $request->user_id;
        $bill->save();

        $bill_id = $bill->id;
        foreach ($request['items'] as $item) {
            Sale::create([
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
                $product->quantity -= $item['qty'];
                $product->save();
            }
            $customer = Customer::find($request['customer_id']);
            if ($customer) {
                $customer->amount -= $item['total'];
                $customer->save();
            }
            $bill_update = Bill::find($bill_id);
            if ($bill_update) {
                $bill_update->total += $item['total'];
                $bill_update->save();
            }
        }
        return response()->json(['message' => 'Sales created successfully.']);
    }
}
