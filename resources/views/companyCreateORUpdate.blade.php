@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                    <form action="/store_company" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="company_id" value="{{$companyData->id?? null}}">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">{{ __('admin.company_creation') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('admin.company_name') }}</label>
                                    <input value="{{old('company_name', $companyData->name?? null )}}" name="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" placeholder="{{ __('admin.company_name') }}">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('admin.email_address') }}</label>
                                    <input value="{{old('email', $companyData->email?? null )}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="{{ __('admin.email_address') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('admin.file_input') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">{{ __('admin.choose_file') }}</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ __('admin.upload') }}</span>
                                        </div>
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">URL</label>
                                    <input value="{{old('url', $companyData->url?? null )}}" name="url" type="text" class="form-control @error('url') is-invalid @enderror" placeholder="URL">
                                    @error('url')
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
