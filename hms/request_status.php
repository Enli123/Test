<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request Status</title>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>


</head>
<body>
<div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">

        <?php include('include/header.php'); ?>

        <!-- end: TOP NAVBAR -->
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Request Status</h1>
                        </div>

                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: BASIC EXAMPLE -->

                <div class="row margin-top-10">
                    <div class="col-lg-10">


                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Donor Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Address</th>
                                <th scope="col">Blood Group</th>
                                <th scope="col">Request Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php


                            include "connection.php";

                            $query = "SELECT drg.donor_id,drg.city,drg.mobile_no,drg.user_name,drg.address,cart.is_approved,bg.group_name,cart.created_at FROM `cart`,donor_reg_form drg,blood_group bg where cart.donor_id = drg.donor_id and bg.group_id = cart.group_id and user_id = $user_id order by cart.created_at desc";
                            $run_query = mysqli_query($conn, $query);

                            while ($row = $run_query->fetch_object()) {

                                ?>


                                <tr>
                                    <td><?php echo $row->user_name ?></td>
                                    <td><?php echo $row->city ?></td>
                                    <td><?php echo $row->address ?></td>
                                    <td><?php echo $row->group_name ?></td>
                                    <td>
                                        <?php
                                        echo $date = date('d-m-Y', strtotime($row->created_at));
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($row->is_approved == 0) {
                                            echo "Pending";
                                        } else if ($row->is_approved == 1) {

                                            ?>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                               data-whatever="<?php echo $row->mobile_no ?>">Approved</a>
                                            <?php
                                        } else {
                                            echo "Rejected";
                                        }
                                        ?>
                                    </td>

                                </tr>


                            <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>


                <!-- end: SELECT BOXES -->

            </div>



        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Donor Mobile Number</h5>

                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="mobile" class="col-form-label">Mobile No:</label>
                                <input type="text" class="form-control" id="mobile_no" readonly>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->

    <!-- start: SETTINGS -->

    <!-- end: SETTINGS -->


</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormElements.init();
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>


<script>

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')

        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })

</script>
