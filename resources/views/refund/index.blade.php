@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-calendar-alt"></i>&nbsp;@lang('view.orders')</h1>
@stop

@section('content')
    <!--devoluçoes-->
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.refunds')</h3>
                        <div class="card-tools">
                            <a type="button" href="{{route('refund.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-exchange-alt"></i>&nbsp;@lang('view.refund')
                            </a>
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
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Created At
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">Options
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($refunds as $refund)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $refund->user->name}}</td>
                                                <td>{{$refundgetid->where('order_id', '=', $refund->id)->sum('amount')}}€</td>
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
@stop