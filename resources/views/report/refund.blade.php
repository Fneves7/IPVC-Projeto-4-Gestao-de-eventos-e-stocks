@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-calendar-alt"></i>&nbsp;@lang('view.refunds')</h1>
@stop

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.refunds')</h3>
                        <div class="card-tools">
                            <div class="card-tools no-print">
                                <a type="button" id="print" onclick="printInvoice()" target="_blank" class="btn btn-md btn-secondary">
                                    <i class="fas fa-print"></i>&nbsp;@lang('view.print')
                                </a>
                                <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
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
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($refunds as $refund)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $refund->user->name}}</td>
                                                <td>{{$refundgetid->where('order_id', '=', $refund->id)->sum('amount')}}
                                                    €
                                                </td>
                                                <td>
                                                    @if($refund->status == 1)
                                                        <i class="fas fa-check-circle" style="color: #5cb85c"></i>
                                                    @else
                                                        <i class="fas fa-ban" style="color: #d9534f"></i>
                                                    @endif
                                                </td>
                                                <td>{{$refund->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row no-print">
                        <div class="col-12">
                            <div class="card-footer">
                                <a type="button" href="{{route('order.index')}}"
                                   class="btn btn-default">@lang('view.return')</a>
                            </div>
                        </div>
                    </div>
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
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    {{--imprimir recibo--}}
    <script type="text/javascript">
        function printInvoice() {
            window.addEventListener("load", window.print());
        }
    </script>
@stop
