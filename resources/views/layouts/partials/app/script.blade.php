<!-- JAVASCRIPT -->
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- multiple-select -->
<script src="{{ asset('assets/libs/multiple-select-2.2.0/dist/multiple-select.js') }}"></script>

<script>
    (document.querySelectorAll("[toast-list]") || document.querySelectorAll("[data-choices]") || document.querySelectorAll("[data-provider]")) && (document.writeln("<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'><\/script>"), document.writeln("<script type='text/javascript' src='{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}'><\/script>"), document.writeln("<script type='text/javascript' src='{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}'><\/script>"));
</script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>