@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                    <form action="/update_admin" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="admin_id" value="{{$adminData->id?? null}}">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">{{ __('admin.admin_edit') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('admin.admin_name') }}</label>
                                    <input value="{{old('name', $adminData->name?? null )}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('admin.name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.email_address') }}</label>
                                    <input value="{{old('email', $adminData->email?? null )}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="{{ __('admin.email_address') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.password_new') }}</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('admin.password_new') }}">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.password_confirmation') }}</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('admin.password_confirmation') }}">
                                    @error('password_confirmation')
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
