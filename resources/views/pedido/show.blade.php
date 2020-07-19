@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-calendar-alt"></i>&nbsp;@lang('view.orders')</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    @foreach($order as $key)
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-truck"></i> {{config('app.name')}}
                                    <small class="float-right">Data:&nbsp;{{\Carbon\Carbon::today()->format('Y-m-d')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>{{Auth::user()->name}}</strong><br>
                                    {{Auth::user()->address}}<br>
                                    {{Auth::user()->zip_code}}<br>
                                    VAT: {{Auth::user()->vat}}<br>
                                    Phone: {{Auth::user()->contact}}<br>
                                    Email: {{Auth::user()->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('view.orderqty')</th>
                                        <th>@lang('view.product')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderd as $order)
                                        <tr>
                                            <td>{!! $order->quantity !!}</td>
                                            @foreach($order->products()->get() as $key)
                                                <td>{!!$key->name!!}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                @endforeach
                <!-- this row will not appear when printing -->

                    <div class="row no-print">
                        <div class="col-12">
                            <div class="card-footer">
                                <a type="button" href="{{route('pedido.index')}}"
                                   class="btn btn-default">@lang('view.return')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('partials.js')

    {{--imprimir recibo--}}
    <script type="text/javascript">
        function printInvoice() {
            window.addEventListener("load", window.print());
        }
    </script>
@stop
