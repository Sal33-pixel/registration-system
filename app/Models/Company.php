<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Employee;

class Company extends Model
{
    use HasFactory;

    public static function list()
    {
        return self::withCount('employees')
            ->selectRaw('users.name as author')
            ->leftJoin('users', 'users.id', '=', 'companies.user_id')
            ->paginate(10);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public static function storeSaveAndUpdateModel($request)
    {
        if($request->company_id){
            $data = self::find($request->company_id);
            if(file_exists(public_path('images/'.$data->logo)) && !is_null($data->logo)){
                File::delete(public_path("images/".$data->logo));
            }
        }else{
            $data = new self;
        }

        $data->user_id = Auth::user()->id;
        $data->name = $request->company_name;
        $data->email = $request->email;
        $data->url = $request->url;
        $data->save();

        if($request->file('logo')){
            $file = $request->file('logo');
            $filename = $data->id.'.'.$request->file('logo')->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data->logo = $filename;
            $data->save();
        }

        if(!$request->company_id){
            Mail::send('emails.newCompanyReporter', ['companyName' => $request->company_name], function ($message) use ($data) {
                $message->to(\Auth::user()->email, \Auth::user()->name);
                $message->subject( __('admin.email_report') );
            });
        }
    }
}
