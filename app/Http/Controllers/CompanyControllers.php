<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class CompanyControllers extends Controller
{
    public function create()
    {
        return view('companyCreateORUpdate');
    }

    public function storeSaveAndUpdate(CompanyRequest $request)
    {
        Company::storeSaveAndUpdateModel($request);

        return redirect('/admin');
    }

    public function modifier($companyID = null)
    {
        $companyData = Company::find($companyID);

        return view('companyCreateORUpdate', compact('companyData'));
    }

    public function deleteCompany($companyID = null)
    {
        $companyData = Company::find($companyID);
        $employeeData = Employee::where('company_id', $companyID);

        if(file_exists(public_path('images/'.$companyData->logo)) && !is_null($companyData->logo)){
            File::delete(public_path("images/".$companyData->logo));
        }

        $companyData->delete();
        $employeeData->delete();

        return redirect()->back();
    }
}
