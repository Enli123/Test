<?php

include "connection.php";

if (isset($_POST['submit'])) {


    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "SELECT user_id,user_name,email,password FROM `reg_form` where email ='$email' and password = '$pwd'";
    $stmt = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($stmt);

    if ($num > 0) {

        $row = $stmt->fetch_object();
        session_start();
        $_SESSION['requester_name'] = $row->user_name;
        $_SESSION['requester_id'] = $row->user_id;
        $_SESSION['login'] = "Yes";

        echo "<script>alert('Login Successfully')</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
    } else {

        echo "<script>alert('Login Failed')</script>";
        echo "<script>window.location.href='requester-login.php'</script>";

    }

}
?>
