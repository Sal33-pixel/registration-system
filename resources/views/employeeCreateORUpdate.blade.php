@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                    <form action="/store_employee" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($companyID) && !empty($companyID))
                            <input type="hidden" name="company_id" value="{{$companyID}}">
                        @elseif (isset($employeeData->company_id) && !empty($employeeData->company_id))
                            <input type="hidden" name="company_id" value="{{$employeeData->company_id}}">
                        @else
                            <input type="hidden" name="company_id" value="{{null}}">
                        @endif

                        <input type="hidden" name="employee_id" value="{{$employeeData->id?? null}}">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">{{ __('admin.create_employee_in_company') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('admin.last_name') }}</label>
                                    <input value="{{old('last_name', $employeeData->last_name?? null )}}" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('admin.last_name') }}">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('admin.first_name') }}</label>
                                    <input value="{{old('first_name', $employeeData->first_name?? null )}}" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('admin.first_name') }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('admin.email_address') }}</label>
                                    <input value="{{old('email', $employeeData->email?? null )}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="{{ __('admin.email_address') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{ __('admin.call_number') }}</label>
                                    <input value="{{old('call_number', $employeeData->call_number?? null )}}" name="call_number" type="text" class="form-control @error('call_number') is-invalid @enderror" placeholder="{{ __('admin.call_number') }}">
                                    @error('call_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
                                <a href="{{ URL::previous() }}" type="button" class="btn btn-warning">{{ __('admin.cancel') }}</a>
                            </div>
                            </form>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
