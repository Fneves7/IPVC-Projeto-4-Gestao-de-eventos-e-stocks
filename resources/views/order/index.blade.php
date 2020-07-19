@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-calendar-alt"></i>&nbsp;@lang('view.orders')</h1>
@stop

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.orders')</h3>
                        <div class="card-tools">
                            <a type="button" href="#" class="btn btn-md btn-secondary">
                                <i class="fas fa-search"></i>&nbsp;Ver relatórios
                            </a>

                            @can('warehouse-view')
                            <a type="button" href="{{route('order.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-plus"></i>&nbsp;@lang('view.purchaseorder')
                            </a>
                            @endcan

                            <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
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
                                                style="width: 201px;">@lang('view.buyer')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.total')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.approved')
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Created At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">@lang('view.options')
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $order->user->name}}</td>
                                                <td>{{$getid->where('order_id', '=', $order->id)->sum('amount')}}€</td>
                                                <td>
                                                    @if($order->status == 1)
                                                        <i class="fas fa-check-circle" style="color: #5cb85c"></i>
                                                    @else
                                                        <i class="fas fa-ban" style="color: #d9534f"></i>
                                                    @endif
                                                </td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <div class="row">
                                                    <a type="button" href="{{route('order.show',[$order->id] )}}"
                                                       class="btn btn-md btn-info">
                                                    <i class="fas fa-eye" style="color:white"></i></a>
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

    <!--devoluçoes-->
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.refunds')</h3>
                        <div class="card-tools">
                            <a type="button" href="#" class="btn btn-md btn-secondary">
                                <i class="fas fa-search"></i>&nbsp;Ver relatórios
                            </a>
                            @can('a-w-b')
                            <a type="button" href="{{route('refund.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-exchange-alt"></i>&nbsp;@lang('view.refund')
                            </a>
                            @endcan
                            <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="refunddatatable" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.buyer')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.total')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.approved')
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Created At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">@lang('view.options')
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($refunds as $refund)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $refund->user->name}}</td>
                                                <td>{{$refundgetid->where('order_id', '=', $refund->id)->sum('amount')}}€</td>
                                                <td>
                                                    @if($refund->status == 1)
                                                        <i class="fas fa-check-circle" style="color: #5cb85c"></i>
                                                    @else
                                                        <i class="fas fa-ban" style="color: #d9534f"></i>
                                                    @endif
                                                </td>
                                                <td>{{$refund->created_at}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a type="button" href="{{route('refund.show',[$refund->id] )}}"
                                                           class="btn btn-md btn-info">
                                                        <i class="fas fa-eye" style="color:white"></i></a>
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

    {{--guias de transporte--}}
    @can('a-w-s')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.transportguide')</h3>
                        <div class="card-tools">
                            <a type="button" href="#" class="btn btn-md btn-secondary">
                                <i class="fas fa-search"></i>&nbsp;Ver relatórios
                            </a>
                            @can('a-w-b')
                            <a type="button" href="{{route('transportguide.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-plus"></i>&nbsp;@lang('view.transportguide')
                            </a>
                            @endcan
                            <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="tgdatatable" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.buyer')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.total')
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Created At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">@lang('view.options')
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tg as $key)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $key->user->name}}</td>
                                                <td>{{$tggetid->where('order_id', '=', $key->id)->sum('amount')}}€</td>
                                                <td>{{$key->created_at}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a type="button" href="{{route('transportguide.show',[$key->id] )}}"
                                                           class="btn btn-md btn-info">
                                                            <i class="fas fa-eye" style="color:white"></i></a>
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
    @endcan

    @include('partials.js')
    <script>
        $(function () {
            $('#refunddatatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(function () {
            $('#tgdatatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@stop
