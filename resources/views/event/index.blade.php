@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-calendar-alt"></i>&nbsp;Events</h1>
@stop

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Events List</h3>
                        <div class="card-tools">
                            <a type="button" href="{{route('event.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-plus"></i>&nbsp;Create
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
                                                style="width: 201px;">Description
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">Start
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">End
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 50px;">Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Updated At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Options
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $event)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $event->name}}</td>
                                                <td>{{$event->description}}</td>
                                                <td>{{$event->start_date}}</td>
                                                <td>{{$event->end_date}}</td>
                                                <td>
                                                    @if($event->status == 1)
                                                        <i class="fas fa-check-circle" style="color: #5cb85c"></i>
                                                    @else
                                                        <i class="fas fa-ban" style="color: #d9534f"></i>
                                                    @endif
                                                </td>
                                                <td>{{$event->updated_at}}</td>
                                                <td>
                                                    <div class="row">
                                                    <a type="button" href="{{route('event.edit',[$event->id] )}}"
                                                       class="btn btn-md btn-warning">
                                                    <i class="fas fa-edit" style="color:white"></i></a>
                                                    @can('admin-view')
                                                    <form method="POST" action="{{route('event.destroy',$event->id)}}">
                                                        {!! method_field('DELETE') !!}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    @endcan
                                                    </div>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script src="">
        $(document).ready(function () {
            $('#userdatatable').DataTable();
        });
    </script>
@stop
