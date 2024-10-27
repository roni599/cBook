<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    public function company_customer($id)
    {
        $customers = Customer::with(['company'])
            ->where('company_id', $id)
            ->get();
            return response()->json($customers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255|unique:customers,customer_name',
            'company_id' => 'required',
            'user_id' => 'required',
        ]);
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->company_id = $request->company_id;
        $customer->user_id = $request->user_id;
        $customer->save();



        return response()->json(['message' => "Customer Created Successfully"]);
    }
}
