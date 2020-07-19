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
                        <h3 class="card-title">Adicionar ao pedido</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form class="form-horizontal" id="yoyo" role="form" method="POST"
                              action="{{route('pedido.update',$pedido->id)}}">
                            {!! csrf_field() !!}
                            {{method_field('PUT')}}

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>@lang('view.line')</th>
                                    <th>@lang('view.product')</th>
                                    <th>@lang('view.quantity')</th>
                                    <th>@lang('view.cancel')</th>
                                </tr>
                                </thead>

                                <tbody class="neworderbody">
                                <tr>
                                    <td class="no">1</td>
                                    <td>
                                        <select required class="select2 form-control product_id" name="product_id[]">
                                            <option value="" disabled selected>@lang('view.selectproduct')</option>
                                            @foreach($products as $product)
                                                <option data-price="{!! $product->price !!}"
                                                        value="{!! $product->id !!}">{!! $product->name!!}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input required type="text" class="qty form-control" name="qty[]"
                                               value="1">
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-danger delete"
                                               value="x">
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <button type="button" class="btn btn-md btn-primary add">
                                <i class="fa fa-plus"></i>&nbsp;
                                @lang('view.newline')
                            </button>

                            <input hidden name="user_id" value="{{Auth::user()->id}}">
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i
                                    class="fa fa-save"></i>&nbsp;@lang('view.placeorder')</button>
                        <a type="button" href="{{route('pedido.index')}}"
                           class="btn btn-default">@lang('view.cancel')</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        function totalAmount() {
            var t = 0;
            $('.amount').each(function (i, e) {
                var amt = $(this).val() - 0;
                t += amt;
            });
            $('.total').html(t);
        }

        $(function () {
            $('.add').click(function () {
                var product = $('.product_id').html();
                var n = ($('.neworderbody tr').length - 0) + 1;
                var tr =
                    '<tr><td class="no">' + n + '</td>' +
                    '<td><select required class="select2 form-control product_id" name="product_id[]">' + product + '</select></td>' +
                    '<td><input required type="text" class="qty form-control" name="qty[]" value="1"></td>' +
                    '<td><input required type="button" class="btn btn-danger delete" value="x"></td></tr>';
                $('.neworderbody').append(tr);
            });
            $('.neworderbody').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                totalAmount();
            });
            $('.neworderbody').delegate('.product_id', 'change', function () {
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);

                var qty = tr.find('.qty').val() - 0;
                var dis = tr.find('.dis').val() - 0;
                var price = tr.find('.price').val() - 0;

                var total = (qty * price) - ((qty * price * dis) / 100);
                tr.find('.amount').val(total);
                totalAmount();
            });

            $('#hideshow').on('click', function (event) {
                $('#content').removeClass('hide');
                $('#content').addClass('show');
                $('#content').toggle('show');
            });
        });
    </script>


    {{--Select2(selects com search)--}}
    <link rel="stylesheet" href="/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $('.select2').select2()
    </script>
@stop