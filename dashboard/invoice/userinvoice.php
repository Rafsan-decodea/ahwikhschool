<?php
require_once 'vendor/autoload.php';
//use Dompdf\Dompdf;
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/route/function.php';
$routes = include $_SERVER['DOCUMENT_ROOT'] . '/route/routes.php';
run('/db', $routes);
$db = new DB();

if (!isset($_SESSION["id"])) {
    run("/", $routes);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/dashboard/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>

    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="">
                <div class="card rounded-3">
                    <img src="logo.png" class="" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                        alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <!-- <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3> -->
                        <div class="my-5 page">
                            <div class="p-5">
                                <!-- <section class="top-content bb d-flex justify-content-between">
                                    <div class="logo">

                                    </div>
                                    <div class="top-left">
                                        <div class="graphic-path">
                                            <p>Invoice</p>
                                        </div>
                                        <div class="position-relative">
                                            <p>Invoice No. <span>XXXX</span></p>
                                        </div>
                                    </div>
                                </section> -->

                                <section class="store-user mt-5">
                                    <div class="col-10">
                                        <div class="row bb pb-3">
                                            <div class="col-7">
                                                <p>Supplier,</p>
                                                <h2>Your Store Name</h2>
                                                <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351,
                                                    <br>Vestavia Hills AL
                                                </p>
                                                <div class="txn mt-2">TXN: XXXXXXX</div>
                                            </div>
                                            <div class="col-5">
                                                <p>Client,</p>
                                                <h2>Sabur Ali</h2>
                                                <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351,
                                                    <br>Vestavia Hills AL
                                                </p>
                                                <div class="txn mt-2">TXN: XXXXXXX</div>
                                            </div>
                                        </div>
                                        <div class="row extra-info pt-3">
                                            <div class="col-7">
                                                <p>Payment Method: <span>bKash</span></p>
                                                <p>Order Number: <span>#868</span></p>
                                            </div>
                                            <div class="col-5">
                                                <p>Deliver Date: <span>10-04.2021</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="balance-info">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="m-0 font-weight-bold"> Note: </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In delectus,
                                                adipisci vero est dolore praesentium.</p>
                                        </div>
                                        <div class="col-4">
                                            <table class="table border-0 table-hover">
                                                <tr>
                                                    <td>Sub Total:</td>
                                                    <td>800$</td>
                                                </tr>
                                                <tr>
                                                    <td>Tax:</td>
                                                    <td>15$</td>
                                                </tr>
                                                <tr>
                                                    <td>Deliver:</td>
                                                    <td>10$</td>
                                                </tr>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total:</td>
                                                        <td>825$</td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <!-- Signature -->
                                            <div class="col-12">
                                                <img src="signature.png" class="img-fluid" alt="">
                                                <p class="text-center m-0"> Director Signature </p>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Cart BG -->
                                <img src="cart.jpg" class="img-fluid cart-bg" alt="">

                                <footer>
                                    <hr>
                                    <p class="m-0 text-center">
                                        View THis Invoice Online At - <a href="#!"> invoice/saburbd.com/#868 </a>
                                    </p>
                                    <div class="social pt-3">
                                        <span class="pr-2">
                                            <i class="fas fa-mobile-alt"></i>
                                            <span>0123456789</span>
                                        </span>
                                        <span class="pr-2">
                                            <i class="fas fa-envelope"></i>
                                            <span>me@saburali.com</span>
                                        </span>
                                        <span class="pr-2">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>/sabur.7264</span>
                                        </span>
                                        <span class="pr-2">
                                            <i class="fab fa-youtube"></i>
                                            <span>/abdussabur</span>
                                        </span>
                                        <span class="pr-2">
                                            <i class="fab fa-github"></i>
                                            <span>/example</span>
                                        </span>
                                    </div>
                                </footer>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>

<script src="/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Bootstrap 4 -->
<script src="/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/dashboard/plugins/moment/moment.min.js"></script>
<script src="/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dashboard/dist/js/pages/dashboard.js"></script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


<!-- <div class="container ">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="">
                <div class="card rounded-3">
                    <img src="logo.png" class="" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                        alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                        <div class="form-outline mb-4">
                            <p style="size: 200;">নাম</p>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">

                            </div>
                        </div>
                        <div class=" mb-4 ">
                            <div class="">

                            </div>
                        </div>

                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div> -->