<?php

include "connection.php";


if ($_GET['did']) {

    session_start();

    $user_id = $_SESSION['requester_id'];

    $donor_id = $_GET['did'];
    $group_id = $_GET['gid'];


    $sql = "SELECT cart_id FROM `cart` where user_id = $user_id and group_id = $group_id and donor_id=$donor_id and is_approved = 0";
    $data = $conn->query($sql);
    $num = mysqli_num_rows($data);


    if ($num > 0) {

        echo "<script>alert('You have Already Requested')</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
    } else {


        $query = "INSERT INTO `cart`( `user_id`, `qty`, `donor_id`, `group_id`) VALUES($user_id,'1',$donor_id,$group_id)";

        if ($conn->query($query)) {
            echo "<script>alert('Request sent Successfully')</script>";
            echo "<script>window.location.href='dashboard.php'</script>";
        } else {

            echo "<script>alert('Something went wrong')</script>";
            echo "<script>window.location.href='dashboard.php'</script>";
        }
    }


}


?>