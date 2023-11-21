@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col">
                                <h3 class="card-title">{{ __('admin.list_of_companies') }}</h3>
                            </div>
                            <div class="col">
                                <a href="/create_company" type="button" class="btn btn-primary float-right">{{ __('admin.create_new_companies') }}</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('admin.company_name') }}</th>
                                <th>{{ __('admin.author_name') }}</th>
                                <th>{{ __('admin.email') }}</th>
                                <th>{{ __('admin.url') }}</th>
                                <th>{{ __('admin.number_of_employees') }}</th>
                                <th>{{ __('admin.create_date') }}</th>
                                <th>{{ __('admin.function') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($companiesList as $row)
                                    <tr>
                                        <td>
                                            @if(file_exists(public_path('images/'.$row->logo)) && !is_null($row->logo))
                                            <a href="{{ asset('images/'.$row->logo)}}" data-toggle="lightbox" data-toggle="tooltip" data-placement="bottom" title="{{ __('admin.view_logo') }}">
                                                {{$row->name?? " - "}}
                                            </a>
                                            @else
                                                {{$row->name?? " - "}}
                                            @endif
                                        </td>
                                        <td>{{$row->author?? " - "}}</td>
                                        <td>{{$row->email?? " - "}}</td>
                                        <td>
                                            @if($row->url)
                                                <a href="{{$row->url}}">{{$row->url}}</a>
                                            @else
                                                -
                                            @endif

                                        </td>
                                        <td>{{$row->employees_count?? " - "}}</td>
                                        <td>{{$row->created_at->format('Y.m.d')?? " - "}}</td>
                                        <td>
                                            <a href="/list_of_employees/{{$row->id}}" type="button" class="btn btn-info btn-sm" data-toggle="lightbox" data-toggle="tooltip" data-placement="bottom" title="{{ __('admin.list_of_employees') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm8 352V128h6.9c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352h0zM58.2 182.3c19.9-33.1 55.3-53.5 93.8-54.3V384h0v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384H70.2c-10.9 0-18.6-10.7-15.2-21.1L93.3 248.1 59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l53.6-89.2z"/></svg>
                                            </a>
                                            <a href="/modifier_company/{{$row->id}}" type="button" class="btn btn-success btn-sm" data-toggle="lightbox" data-toggle="tooltip" data-placement="bottom" title="{{ __('admin.editing') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M413.5 237.5c-28.2 4.8-58.2-3.6-80-25.4l-38.1-38.1C280.4 159 272 138.8 272 117.6V105.5L192.3 62c-5.3-2.9-8.6-8.6-8.3-14.7s3.9-11.5 9.5-14l47.2-21C259.1 4.2 279 0 299.2 0h18.1c36.7 0 72 14 98.7 39.1l44.6 42c24.2 22.8 33.2 55.7 26.6 86L503 183l8-8c9.4-9.4 24.6-9.4 33.9 0l24 24c9.4 9.4 9.4 24.6 0 33.9l-88 88c-9.4 9.4-24.6 9.4-33.9 0l-24-24c-9.4-9.4-9.4-24.6 0-33.9l8-8-17.5-17.5zM27.4 377.1L260.9 182.6c3.5 4.9 7.5 9.6 11.8 14l38.1 38.1c6 6 12.4 11.2 19.2 15.7L134.9 484.6c-14.5 17.4-36 27.4-58.6 27.4C34.1 512 0 477.8 0 435.7c0-22.6 10.1-44.1 27.4-58.6z"/></svg>
                                            </a>
                                            <a href="/delete_company/{{$row->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="lightbox" data-toggle="tooltip" data-placement="bottom" title="{{ __('admin.delet') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $companiesList->onEachSide(10)->links("pagination::bootstrap-4") }}
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
