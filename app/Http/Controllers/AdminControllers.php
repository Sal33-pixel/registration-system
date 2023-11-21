<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminRequest;
use App\Models\Company;
use App\Models\Admin;

class AdminControllers extends Controller
{
    public function index()
    {
        $companiesList = Company::list();

        return view('companyList', compact('companiesList'));
    }

    public function modifier()
    {
        $adminData = Auth::user();

        return view('adminUpdate', compact('adminData'));
    }

    public function adminUpdate(AdminRequest $request)
    {
        Admin::adminUpdateModel($request);

        return redirect('/admin');
    }
}
