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
                @foreach($tg as $key)
                    <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-truck"></i> {{config('app.name')}}
                                    <small class="float-right">Date:&nbsp;{{\Carbon\Carbon::today()->format('Y-m-d')}}</small>
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
                            <div class="col-sm-4 invoice-col">
                                @lang('view.invoiceto')
                                <address>
                                    @foreach($key->user()->get() as $user)
                                        <strong>{{$user->name}}</strong><br>
                                        {{$user->address}}<br>
                                        {{$user->zip_code}}<br>
                                        VAT:{{$user->vat}}<br>
                                        Phone: {{$user->contact}}<br>
                                        Email: {{$user->email}}
                                    @endforeach
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>@lang('view.transportguide') #{{$key->id}}</b><br>
                                <br>
                                <b>@lang('view.paymentdue')</b> {{$key->created_at->format('Y-m-d')}}<br>
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
                                        <th>@lang('view.unitprice')</th>
                                        <th>@lang('view.discount')</th>
                                        <th>@lang('view.orderamount')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tgd as $prodetail)
                                        <tr>
                                            <td>{!! $prodetail->quantity !!}</td>
                                            @foreach($prodetail->products()->get() as $item)
                                                <td>{!! $item->name !!}</td>
                                            @endforeach
                                            <td>{!! $prodetail->unitprice !!}€</td>
                                            <td>{!! $prodetail->discount !!}</td>
                                            <td>{!! $prodetail->amount !!}€</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total: </th>
                                            <td><strong>{{$tgd->sum('amount')}}€</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                @endforeach
                <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <div class="card-footer">
                                <a type="button" href="{{route('order.index')}}"
                                   class="btn btn-default">@lang('view.return')</a>
                                <a id="print" onclick="printInvoice()" target="_blank" class="btn btn-primary float-right" style="color: white">
                                    <i class="fas fa-print"></i> Print</a>
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
