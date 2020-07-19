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
                        <h3 class="card-title">@lang('view.createtg')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" id="yoyo" role="form" method="POST"
                              action="{{route('transportguide.store')}}">
                            {!! csrf_field() !!}
                            <table class="table table-striped">
                                <tr>
                                    <td>
                                        @lang('view.buyer'):
                                        <select required class="select2 form-control" id="user_id" name="user_id" type="text">
                                            <option value="" disabled selected>@lang('view.selectbuyer')</option>
                                            @foreach($users as $user)
                                                @foreach($user->roles as $role)
                                                    @if($role->name != 'Supplier')
                                                        <option value="{{$user->id}}">{{$user->id .' - '. $user->name}}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>@lang('view.line')</th>
                                    <th>@lang('view.product')</th>
                                    <th>@lang('view.quantity')</th>
                                    <th>@lang('view.unitprice')</th>
                                    <th>@lang('view.discount')</th>
                                    <th>@lang('view.orderamount')</th>
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
                                        <input required type="text" class="price form-control" name="price[]"
                                               value="{{ old('email') }}">
                                    </td>
                                    <td>
                                        <input required type="text" class="dis form-control" name="dis[]" value="0">
                                    </td>
                                    <td>
                                        <input required type="text" class="amount form-control"
                                               name="amount[]">
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

                            <div class="container-fluid col-3">
                                <div class="info-box bg-info">
                                    <span class="info-box-icon"><i class="fa fa-euro-sign"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">@lang('view.total')</span>
                                        <span class="info-box-number total">0</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i
                                    class="fa fa-save"></i>&nbsp;@lang('view.placeorder')</button>
                        <a type="button" href="{{route('order.index')}}"
                           class="btn btn-default">@lang('view.cancel')</a>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @include('modal.recipt')
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
            $('.getmoney').change(function () {
                var total = $('.total').html();
                var getmoney = $(this).val();
                var t = getmoney - total;
                $('.backmoney').val(t).toFixed(2);
            });
            $('.add').click(function () {
                var product = $('.product_id').html();
                var n = ($('.neworderbody tr').length - 0) + 1;
                var tr =
                    '<tr><td class="no">' + n + '</td>' +
                    '<td><select required class="select2 form-control product_id" name="product_id[]">' + product + '</select></td>' +
                    '<td><input required type="text" class="qty form-control" name="qty[]" value="1"></td>' +
                    '<td><input required type="text" class="price form-control" name="price[]" value="{{ old('email') }}"></td>' +
                    '<td><input required type="text" class="dis form-control" name="dis[]" value="0"></td>' +
                    '<td><input required type="text" class="amount form-control" name="amount[]"></td>' +
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
                //var price = tr.find('.price').val() - 0;

                var total = (qty * price) - ((qty * price * dis) / 100);
                tr.find('.amount').val(total);
                totalAmount();
            });

            $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val() - 0;
                var dis = tr.find('.dis').val() - 0;
                var price = tr.find('.price').val() - 0;

                //desconto
                var total = (qty * price) - ((qty * price * dis) / 100);
                tr.find('.amount').val(total);
                totalAmount();
            });

            $('#hideshow').on('click', function (event) {
                $('#content').removeClass('hidden');
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