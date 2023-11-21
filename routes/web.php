<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/set_language/{locale}', [App\Http\Controllers\LanguageController::class, 'setLanguage']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware'=>'CheckAdmin'],function (){
    Route::get('/admin', [App\Http\Controllers\AdminControllers::class, 'index']);
    Route::get('/modifier_admin', [App\Http\Controllers\AdminControllers::class, 'modifier']);
    Route::post('/update_admin', [App\Http\Controllers\AdminControllers::class, 'adminUpdate']);

    Route::get('/create_company', [App\Http\Controllers\CompanyControllers::class, 'create']);
    Route::post('/store_company', [App\Http\Controllers\CompanyControllers::class, 'storeSaveAndUpdate']);

    Route::get('/modifier_company/{companyID}', [App\Http\Controllers\CompanyControllers::class, 'modifier']);

    Route::get('/delete_company/{companyID}', [App\Http\Controllers\CompanyControllers::class, 'deleteCompany']);

    Route::get('/list_of_employees/{companyID}', [App\Http\Controllers\EmployeesController::class, 'index']);

    Route::get('/create_employee/{companyID}', [App\Http\Controllers\EmployeesController::class, 'create']);
    Route::get('/modifier_employee/{employeeID}', [App\Http\Controllers\EmployeesController::class, 'modifier']);
    Route::post('/store_employee', [App\Http\Controllers\EmployeesController::class, 'storeSaveAndUpdate']);
    Route::get('/delete_employee/{employeeID}', [App\Http\Controllers\EmployeesController::class, 'deleteEmployee']);
});
