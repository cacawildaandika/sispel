<div class="clearfix"></div>
<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2018 Ela Admin
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="https://colorlib.com">Colorlib</a>
            </div>
        </div>
    </div>
</footer>
<!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<script>
    $().toast({
        delay : 5000
    })

    function toastSuccess(content) {
        $(".toast-header .mr-auto").html(content)
        $(".toast-header").css("background-color", "#51A351").css("opacity", "0.8")
        $(".toast-header").css("color", "white")
        $('.toast').toast('show')
    }

    function toastError(content) {
        $(".toast-header .mr-auto").html(content)
        $(".toast-header").css("background-color", "#BD362F").css("opacity", "0.8")
        $(".toast-header").css("color", "white")
        $('.toast').toast('show')
    }

    function hideToastr() {
        $('.toast').toast('hide')
    }

    function changePassword() {
        $.ajax({
            url : "/admin/doChangePassword",
            method : "POST",
            data : {
                oldPass : $("#oldPass").val(),
                newPass : $("#newPass").val(),
                confirmNewPass : $("#confirmNewPass").val(),
                username : '<?= $_SESSION["username"]?>'
            },
            success : function(res){
                switch (res) {
                    case '0':
                        toastError("Pastikan konfirmasi password sama dengan password baru")
                        break;

                    case '1':
                        toastError("Password sekarang salah")
                        break;

                    case '2':
                        toastSuccess("Sukses ganti password")
                        $('#modal-default').modal('toggle')
                        break;

                    default:
                        toastError("Error")
                        break;
                }
                $("#oldPass").val('')
                $("#newPass").val('')
                $("#confirmNewPass").val('')
            }
        })
    }
</script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="/assets/js/init/fullcalendar-init.js"></script>
</body>

</html>