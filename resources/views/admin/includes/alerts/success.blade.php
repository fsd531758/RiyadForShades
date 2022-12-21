@if(Session::has('success'))
    <script>
        {{--toastr.options =--}}
        {{--    {--}}
        {{--        "closeButton" : true,--}}
        {{--        "progressBar" : true,--}}
        {{--        "positionClass": 'toast-top-left',--}}
        {{--    }--}}
        {{--toastr.success("{{ Session::get('success') }}");--}}

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "{{app()->getLocale() == 'ar' ? 'toast-top-left' : 'toast-top-right'}}",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.success("{{ Session::get('success') }}");
    </script>
@endif


