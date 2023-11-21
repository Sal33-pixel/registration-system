<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{
    public function index($companyID = null)
    {
        $companiesName = Company::select('name')
            ->where('id', $companyID)
            ->first();
        $employeesList = Employee::list($companyID);

        return view('employeesList', compact('employeesList', 'companiesName', 'companyID'));
    }

    public function create($companyID = null)
    {
        return view('employeeCreateORUpdate', compact('companyID'));
    }

    public function storeSaveAndUpdate(EmployeeRequest $request)
    {
        Employee::storeSaveAndUpdateModel($request);

        return redirect('/list_of_employees/'.$request->company_id);
    }

    public function modifier($employeeID = null)
    {
        $employeeData = Employee::find($employeeID);

        return view('employeeCreateORUpdate', compact('employeeData'));
    }

    public function deleteEmployee($employeeID = null)
    {
        $employeeData = Employee::find($employeeID);
        $employeeData->delete();

        return redirect()->back();
    }
}
