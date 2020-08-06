<?php

include "connection.php";

if (isset($_POST['submit'])) {


    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "SELECT email,password FROM `donor_reg_form` where email ='$email' and password = '$pwd'";
    $stmt = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($stmt);

    if ($num > 0) {


        $stmt = "SELECT * FROM `donor_reg_form` where email = '$email' and password = '$pwd'";
        $result = $conn->query($stmt);
        $row = $result->fetch_object();
        $is_approved = $row->is_approved;


        if ($is_approved == 0) {
            echo "<script>alert('Your Account request is Pending')</script>";
            echo "<script>window.location.href='donor-login.php'</script>";
        } else if ($is_approved == 2) {

            echo "<script>alert('Your Account request has been Rejected')</script>";
            echo "<script>window.location.href='donor-login.php'</script>";
        } else {

            session_start();
            $_SESSION['donor_name'] = $row->user_name;
            $_SESSION['donor_id'] = $row->donor_id;
            $_SESSION['login'] = "Yes";
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.location.href='requester_list.php'</script>";
        }


    } else {

        echo "<script>alert('Login Failed')</script>";
        echo "<script>window.location.href='donor-login.php'</script>";

    }

}
?>
