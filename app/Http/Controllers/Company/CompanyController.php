<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return response()->json('i am okey from Company');
    }
    public function user_allcompany($id)
    {

        $companies = User::with('companies')->find($id);
        return response()->json($companies);
    }
    public function user_company_find($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }
    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'mobile'      => 'required|string|max:15',
            'email'       => 'required|string|email|max:255|',
            'user_id'       => 'required',
        ]);
        $company = new Company();
        $company->company_name = $request->companyName;
        $company->mobile = $request->mobile;
        $company->email = $request->email;
        $company->user_id = $request->user_id;
        $company->save();
        return response()->json([
            'message' => 'Company Created Successfully'
        ]);
    }
}
