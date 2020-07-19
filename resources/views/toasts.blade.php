<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if(session('successMsg'))
        toastr.success('{{session('successMsg')}}');
    @endif

    @if(session('errorMsg'))
        toastr.error('{{session('erroMsg')}}');
    @endif

    @if(session('warningMsg'))
        toastr.warning('{{session('warningMsg')}}');
    @endif

    @if(session('infoMsg'))
        toastr.info('{{session('infoMsg')}}');
    @endif
</script>

{{--@if(session('successMsg'))--}}
{{--    <script> toastr.success('{{session('successMsg')}}');</script>--}}
{{--@endif--}}

{{--@if(session('errorMsg'))--}}
{{--    <script> toastr.error('{{session('erroMsg')}}');</script>--}}
{{--@endif--}}