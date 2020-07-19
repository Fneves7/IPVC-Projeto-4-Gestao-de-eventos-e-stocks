@can('admin-view')
    @extends('layouts.admin')
    @section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-barcode"></i>&nbsp;@lang('view.events')</h1>
@stop

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.createevent')</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('event.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">@lang('view.name')</label>
                                <input required type="text" class="form-control" id="inputName" name="name"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="inputName">@lang('view.description')</label>
                                <input required type="text" class="form-control" id="inputDescription"
                                       name="description" placeholder="Enter description">
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label>@lang('view.startdate')</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="datepick" name="start_date">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group col-6">
                                    <label>@lang('view.enddate')</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="datepick2" name="end_date">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="users">@lang('view.selectwarehouse')</label>
                                <select id="users" name="user_id[]" class="form-control select2 select2-container--bootstrap4" style="width: 100%;">
                                    @foreach($users as $key => $user)
                                        @foreach($user->roles as $role)
                                            @if($role->name == 'Warehouse')
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="users">@lang('view.selectbar')</label>
                                <select id="users" class="duallistbox" name="user_id[]" multiple="multiple">
                                    @foreach($users as $key => $user)
                                        @foreach($user->roles as $role)
                                            @if($role->name == 'Bar')
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" class="custom-control-input" id="inputStatus" name="status" value="1">
                                    <label class="custom-control-label" for="inputStatus">@lang('view.status')</label>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            <a type="button" href="{{route('event.index')}}"
                               class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@include('partials/JSEvent')
    {{--Select2(selects com search)--}}
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $('.select2').select2()
    </script>
@stop
@endcan