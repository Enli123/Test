<?php
if (isset($_POST['submit'])) {

    include "connection.php";


    $name = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $id = $_POST['user_id'];


    $stmt = "UPDATE `donor_reg_form` set `user_name` = '$name', `email` = '$email',`city` = '$city',mobile_no='$mobile',address='$address' where donor_id = '$id'";
    $data = $conn->query($stmt);

    if ($data) {

        echo "<script>alert('Profile Updated Successfully')</script>";
        echo "<script>window.location.href='requester_list.php'</script>";
    } else {

        echo "<script>alert('Something went wrong')</script>";
        echo "<script>window.location.href='requester_list.php'</script>";
    }
}

?>