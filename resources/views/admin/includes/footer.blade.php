<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())

                </script> © Skote.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>


{{-- toster js --}}
{{-- toaster.min.js --}}
<script src="{{asset('contents/admin')}}/assets/libs/toastr/toastr.min.js"></script>
{{-- Toster.int. js --}}
<script src="{{asset('contents/admin')}}/assets/js/pages/toastr.init.js"></script>
{{-- NOTIFICATION START --}}
<script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.warning("{{ session('warning') }}");
    @endif
    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.error("{{ session('error') }}");
    @endif

</script>

<!-- JAVASCRIPT -->
<script src="{{asset('contents/admin')}}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/libs/node-waves/waves.min.js"></script>
<!-- custom js -->
<script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
<!-- apexcharts -->
<script src="{{asset('contents/admin')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- dashboard init -->
<script src="{{asset('contents/admin')}}/assets/js/pages/dashboard.init.js"></script>
<!-- App js -->
<script src="{{asset('contents/admin')}}/assets/js/app.js"></script>
</body>

</html>
