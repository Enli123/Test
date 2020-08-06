<?php

include "connection.php";

if (isset($_POST['submit'])) {


    $name = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $pwd = $_POST['password'];

    $stmt = "INSERT INTO `reg_form`(`user_name`, `email`, `password`, `address`, `city`, `mobile_no`) VALUES('$name','$email','$password','$address','$city','$mobile')";
    $data = $conn->query($stmt);

    if($data){

        echo "<script>alert('Registration Successfully')</script>";
        echo "<script>window.location.href='requester-login.php'</script>";
    }
    else{

        header("location:requester-login.php");

    }

}
?>
