<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>
</head>
<body class="login">
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo margin-top-30">
            <h2>Change Password</h2>
        </div>

        <div class="box-login">

            <?php

            include "connection.php";
            session_start();
            $user_id = $_SESSION['donor_id'];

            $stmt2 = "SELECT * FROM `donor_reg_form` where donor_id = $user_id";
            $data2 = mysqli_query($conn, $stmt2);
            $row = $data2->fetch_object();
            ?>


            <form class="form-login" method="post" action="donor-change-password2.php">
                <fieldset>
                    <legend>
                        Change Password
                    </legend>


                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" required/>

                    <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"
                                           name="old_pwd" placeholder="Old Password" required>
									<i class="fa fa-lock"></i> </span>
                    </div>

                    <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"
                                           name="new_pwd" placeholder=" New Password" required>
									<i class="fa fa-lock"></i> </span>
                    </div>


                    <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"
                                           name="confirm_pwd" placeholder="Confirm Password" required>
									<i class="fa fa-lock"></i> </span>
                    </div>

                    <div class="form-actions">

                        <button type="submit" class="btn btn-primary pull-right" name="submit">
                            Sign Up <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>

                </fieldset>
            </form>


        </div>

    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="assets/js/main.js"></script>

<script src="assets/js/login.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        Login.init();
    });
</script>

</body>
<!-- end: BODY -->
</html>