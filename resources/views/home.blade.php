@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @can('admin-view')
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Eventos activos</span>
                            <span class="info-box-number">{{$events}} actualmente</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endcan
        <!-- /.col -->
        @can('a-w-s')
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-boxes"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('view.products')</span>
                        <span class="info-box-number">{{$products->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            @can('warehouse-view')
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">@lang('view.orders')</span>
                            <span class="info-box-number">{{$ordercount}} </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endcan

        <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-exclamation-triangle"
                                                                          style="color: #FFFFFF"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Produtos a esgotar o stock</span>
                        <span class="info-box-number">{{$fewprod->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
                @endcan
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">
                            <div class="row">
                                @can('a-w-b')
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{route('order.create')}}"
                                                   class="d-flex justify-content-center btn btn-success">
                                                    <i class="fa fa-plus fa-3x" style="color: #FFFFFF"></i>
                                                </a>
                                            </div>
                                            <div class="card-footer">
                                                <span class="d-flex justify-content-center">Nova encomenda</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{route('transportguide.create')}}"
                                                   class="d-flex justify-content-center btn btn-info">
                                                    <i class="fa fa-truck fa-3x" style="color: #FFFFFF"></i>
                                                </a>
                                            </div>
                                            <div class="card-footer">
                                                <span class="d-flex justify-content-center">Nova guia de transporte</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{route('refund.create')}}"
                                                   class="d-flex justify-content-center btn btn-danger">
                                                    <i class="fa fa-exchange-alt fa-3x" style="color: #FFFFFF"></i>
                                                </a>
                                            </div>
                                            <div class="card-footer">
                                                <span class="d-flex justify-content-center">Nova devolução</span>
                                            </div>
                                        </div>
                                    </div>
                                @endcan

                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{route('order.index')}}"
                                               class="d-flex justify-content-center btn btn-warning">
                                                <i class="fa fa-file-alt fa-3x" style="color: #FFFFFF"></i>
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <span class="d-flex justify-content-center">@lang('view.reports')</span>
                                        </div>
                                    </div>
                                </div>

                                @can('supplier-view')
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="{{route('product.create')}}"
                                                   class="d-flex justify-content-center btn btn-success">
                                                    <i class="fa fa-plus fa-3x" style="color: #FFFFFF"></i>
                                                </a>
                                            </div>
                                            <div class="card-footer">
                                                <span class="d-flex justify-content-center">Novo produto</span>
                                            </div>
                                        </div>
                                    </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @can('a-w-b')
                    <div class="card">
                        <div class="card-header bg-gradient-warning">
                            <h3 class="card-title">Encomendas realizadas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"
                                        data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool"
                                        data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="products-list product-list-in-card">
                                @foreach($orders as $order)
                                    @if($order->user_id == Auth::user()->id)
                                        <li class="item">
                                            <div class="container-fluid">
                                                <a href="{{route('order.show',[$order->id] )}}"
                                                   class="product-title">#{{$order->id}} -
                                                    {{$order->created_at->format('Y-m-d')}} - Total:
                                                    {{$allorders->where('order_id', '=', $order->id)->sum('amount')}}€
                                                </a>
                                            </div>
                                        </li>
                                @endif
                            @endforeach
                            <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endcan

                @can('a-w-s')
                {{--produtos em falta--}}
                @if($fewprod->count() >= 1)
                    <div class="card">
                        <div class="card-header bg-gradient-warning">
                            <h3 class="card-title">@lang('view.alerts') @lang('view.products')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"
                                        data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool"
                                        data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="products-list product-list-in-card">
                                @foreach($fewprod as $prodkey)
                                    @foreach($products as $product)
                                        @if($prodkey->id == $product->id)
                                            <li class="item">
                                                <div class="container-fluid">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                    <a href="{{route('product.edit',[$product->id] )}}"
                                                       class="product-title">{{$product->name}}</a>
                                                    @if($prodkey->stock == 0)

                                                        <h5><span class="badge badge-danger float-right">{{$prodkey->stock}} unidades</span>
                                                        </h5>
                                                    @else
                                                        <h5><span class="badge badge-warning float-right">{{$prodkey->stock}} unidades</span>
                                                        </h5>
                                                    @endif
                                                    <span class="product-description">Por favor reabasteça este produto.</span>
                                                </div>
                                            </li>
                                    @endif
                                @endforeach
                            @endforeach
                            <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endif
                @endcan
            </div>
        </div>
    </div>
    </div>
@endsection