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
                        <h3 class="card-title">Pedidos de encomenda</h3>
                        <div class="card-tools">
                            @can('bar-view')
                            <a type="button" href="{{route('pedido.create')}}" class="btn btn-md btn-secondary">
                                <i class="fas fa-plus"></i>&nbsp;Novo pedido
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
                                                style="width: 201px;">#
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 124.4px;">@lang('view.buyer')
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
                                        @foreach($pedidos as $pedido)
                                            <tr role="row" class="odd">
                                                <td>Pedido no #{{$pedido->id}}</td>
                                                <td>{{$pedido->user->name}}</td>
                                                <td>{{$pedido->created_at}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a type="button" href="{{route('pedido.show',[$pedido->id] )}}"
                                                           class="btn btn-edmd btn-info">
                                                            <i class="fas fa-eye" style="color:white"></i></a>
                                                        @can('bar-view')
                                                        <a type="button" href="{{route('pedido.edit',[$pedido->id] )}}"
                                                           class="btn btn-md btn-warning">
                                                            <i class="fas fa-plus" style="color:white"></i></a>
                                                        <form method="POST" action="{{route('pedido.destroy',$pedido->id)}}">
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
