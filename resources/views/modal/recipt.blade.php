<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">@lang('view.recipt')</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="panel-body " id="toPrint">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('view.line')</th>
                            <th>@lang('view.orderamount')</th>
                            <th>@lang('view.orderqty')</th>
                            <th>@lang('view.unitprice')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{!! $order->order_id !!}</td>
                                <td>{!! $order->amount !!}</td>
                                <td>{!! $order->quantity !!}</td>
                                <td>{!! $order->unitprice !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        @foreach($orderby as $cust)
                            <li><b>@lang('view.orderedby')</b> {!! $cust->name !!}</li><br>
                        @endforeach
                    </table>
                    <a href="javascript:void(0);" class="btn btn-primary"
                       id="printPage">@lang('view.print')</a>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('view.close')
            </button>
            <button type="button" class="btn btn-primary">@lang('view.savechanges')</button>
        </div>
    </div>
</div>

{{--                    imprimir recibo--}}
<script lang='javascript'>
    $(document).ready(function () {
        $('#printPage').click(function () {
            var data = '<input type="button" value="Print this page" onClick="window.print()">';
            data += '<div id="toPrint">';
            data += $('#toPrint').html();
            data += '</div>';

            myWindow = window.open('', '', 'width=1200,height=1000');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        });
    });
</script>