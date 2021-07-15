        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
        <!-- Magnific Popup -->
        <script src="{{ URL::asset('assets/libs/toastr/toastr.min.js') }}"></script>


        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(".homebutton").click(function() {
                    var emailInput = document.getElementById("emailInput");
                    if (emailInput.value == '') {
                        toastr["error"]("Input Email First.")
                        return;
                    }
                    if (emailInput.checkValidity()) {
                        var action = $(this).attr('action');
                        $("#actionInput").val(action);
                        $("#emailInput2").val(emailInput.value);
                        $("#headerform").submit();
                    } else {
                        emailInput.reportValidity();
                    }
                })
            });

        </script>
        @if (\Session::has('message'))
            <script>
                $(document).ready(function() {
                    toastr["info"]("{{ \Session::get('message') }}")
                });

            </script>
        @endif
        @yield('script')
        @yield('script-bottom')
