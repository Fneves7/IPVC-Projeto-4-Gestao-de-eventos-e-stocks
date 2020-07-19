{{--@can('admin-view')--}}
@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-user"></i> Users</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Users List</h3>
                        <div class="card-tools">
                            <a type="button" href="{{route('admin.usersCreate')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="userdatatable" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.name')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">VAT
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">Address
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">Zip Code
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">Contact
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 264.2px;">E-Mail
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 100px;">Role
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 234.6px;">Last Update
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 170px;">Options
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$user->name}}</td>
                                                <td>{{ $user->vat}}</td>
                                                <td>{{ $user->address}}</td>
                                                <td>{{ $user->zip_code}}</td>
                                                <td>{{ $user->contact}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        <span class="badge badge-info">{{ $role->name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $user->updated_at}}</td>
                                                <td>
                                                    <a type="button" href="{{route('admin.editUserAdmin',[$user->id] )}}"
                                                       class="btn btn-md btn-warning">
                                                    <i class="fas fa-user-edit" style="color:white"></i></a>

                                                    @can('admin-view')
                                                        <form  method="POST" action="{{route('users.destroy',$user->id)}}">
                                                            {!! method_field('DELETE') !!} {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-user-slash"></i></button>
                                                        </form>
                                                    @endcan
                                                        {{--  <a type="button"  class="btn btn-md btn-info"><i class="fas fa-eye"></i></a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @include('partials.js')
@stop
{{--@endcan--}}