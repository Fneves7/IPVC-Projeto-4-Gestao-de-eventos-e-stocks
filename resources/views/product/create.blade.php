{{--@can('admin-view')--}}
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
                        <h3 class="card-title">@lang('view.createproduct')</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('product.store')}}" method="POST">
                        {{ csrf_field() }}

                        <input hidden type="text" class="form-control" id="inputUserId" name="user_id" value="{{Auth::user()->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">@lang('view.barcode')</label>
                                <input required type="text" class="form-control" id="inputBarcode" name="barcode" placeholder="Enter barcode">
                            </div>
                            <div class="form-group">
                                <label for="inputName">@lang('view.name')</label>
                                <input required type="text" class="form-control" id="inputName" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="inputName">@lang('view.price')</label>
                                <input required type="text" class="form-control" id="inputPrice" name="price" placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="inputName">@lang('view.stock')</label>
                                <input required type="text" class="form-control" id="inputStock" name="stock" placeholder="Enter stock">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i></button>
                            <a type="button" href="{{route('product.index')}}" class="btn btn-default">@lang('view.cancel')</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @include('partials.js')
@stop

{{--@endcan--}}
