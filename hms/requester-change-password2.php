<?php
if (isset($_POST['submit'])) {


    include "connection.php";


    $old = $_POST['old_pwd'];
    $new = $_POST['new_pwd'];
    $confirm = $_POST['confirm_pwd'];
    $id = $_POST['user_id'];


    if($new!=$confirm){

        echo "<script>alert('New Password and Confirm Password should be same')</script>";
        echo "<script>window.location.href='requester-change-password.php'</script>";
        return;
    }


    $sql = "select user_id from reg_form where password='$old'";
    $stmt = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($stmt);


    if ($num > 0) {

        $sql = "UPDATE reg_form SET password = '$new' WHERE password = '$old' and user_id = '$id'";
        $stmt = mysqli_query($conn, $sql);

        echo "<script>alert('Password Updated Successfully')</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
    } else {

        echo "<script>alert('Old Password is Incorrect')</script>";
        echo "<script>window.location.href='requester-change-password.php'</script>";
    }
}

?>