<?php

include "connection.php";

if (isset($_POST['submit'])) {


    $name = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $aadhaar = $_POST['aadhaar'];
    $group = $_POST['group'];

    $stmt = "INSERT INTO `donor_reg_form`(`user_name`, `email`, `password`, `address`, `city`, `group_id`, `mobile_no`, `aadhaar_no`) VALUES('$name','$email','$pwd','$address','$city','$group','$mobile','$aadhaar')";
    $data = $conn->query($stmt);

    if($data){

        echo "<script>alert('Registration Successfully')</script>";
        echo "<script>window.location.href='donor-login.php'</script>";
    }
    else{

        header("location:donor-login.php");

    }

}
?>
