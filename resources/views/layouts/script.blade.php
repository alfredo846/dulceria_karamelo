  <!--JAVASCRIPT-->

  <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('assets\js\jquery.min.js') }}"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets\js\nifty.min.js') }}"></script>

    <!--Flot Chart [ OPTIONAL ]-->
    <!-- <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.min.js') }}"></script>
	  <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.resize.min.js') }}"></script>
	  <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.tooltip.min.js') }}"></script> -->

    <!--Sparkline [ OPTIONAL ]-->
    <!-- <script src="{{ asset('assets\plugins\sparkline\jquery.sparkline.min.js') }}"></script> -->

    <!--Specify page [ SAMPLE ]-->
    <!-- <script src="{{ asset('assets\js\demo\dashboard.js') }}"></script> -->

    <script>
        (function() {
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreviewCambiarfoto').html("<img class='fotoperfiluser' src='" + e.target.result + "'/>");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#cambiarimagen').change(function() {
                filePreview(this);
            });
        })();
    </script>

    