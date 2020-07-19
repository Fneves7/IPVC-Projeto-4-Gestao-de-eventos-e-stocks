@extends('layouts.admin')
@section('title', 'Gestão de Eventos e Stocks Dashboard')
@section('content_header')
    <h1><i class="fa fa-barcode"></i> Products</h1>
@stop
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('view.productslist')</h3>
                        <div class="card-tools">
                            {{--                            <a id="myBtn" type="button" href="{{route('admin.importProduct')}}" class="btn btn-md btn-secondary">--}}
                            <a type="button" href="#" class="btn btn-md btn-secondary" data-toggle="modal"
                               data-target="#myModal">
                                <i class="fas fa-file-excel"></i>&nbsp;@lang('view.import')
                            </a>
                            <a type="button" href="{{route('product.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-plus"></i>&nbsp;@lang('view.create')
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
                                                style="width: 201px;">@lang('view.barcode')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.name')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.price')
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 201px;">@lang('view.stock')
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">@lang('view.options')
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stocks as $key)
                                            @foreach($products as $product)
                                                @if($product->id == $key->product_id )
                                                    <tr role="row" class="odd">
                                                        <td>{{ $product->barcode}}</td>
                                                        <td class="sorting_1">{{$product->name}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>
                                                            @if($key->stock == 0) <i class="fa fa-exclamation-triangle"
                                                                                     style="color:#dc3545"></i>
                                                            @elseif($key->stock <= 10)<i
                                                                    class="fa fa-exclamation-triangle"
                                                                    style="color:#ffc107"></i>
                                                            @endif{{$key->stock}}
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <a type="button"
                                                                   href="{{route('product.edit',[$product->id] )}}"
                                                                   class="btn btn-md btn-warning">
                                                                    <i class="fas fa-edit" style="color:white"></i></a>
                                                                @can('admin-view')
                                                                    <form method="POST"
                                                                          action="{{route('product.destroy',$product->id)}}">
                                                                        {!! method_field('DELETE') !!}
                                                                        {{ csrf_field() }}
                                                                        <button type="submit"
                                                                                class="btn btn-md btn-danger"><i
                                                                                    class="fas fa-trash"></i></button>
                                                                    </form>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endif
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @include('modal.excel')
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