<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    public static function list($companyID)
    {
        return self::where('company_id', $companyID)->paginate(10);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function storeSaveAndUpdateModel($request)
    {
        if($request->employee_id){
            $data = self::find($request->employee_id);
        }else{
            $data = new self;
        }

        $data->company_id = $request->company_id;
        $data->last_name = $request->last_name;
        $data->first_name = $request->first_name;
        $data->email = $request->email;
        $data->call_number = $request->call_number;
        $data->save();
    }
}
