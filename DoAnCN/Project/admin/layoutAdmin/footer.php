
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });
</script>

<script src="../admin/assest/js/chart.js"></script>
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>

<script src="../admin/dist/js/adminlte.min.js"></script>

<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="../admin/plugins/flot/jquery.flot.js"></script>
<!-- jQuery Knob -->
<script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="../admin/plugins/sparklines/sparkline.js"></script>

</body>
</html>

