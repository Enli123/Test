<?php

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    /*
    * The create operation
    * When this method is called a new record is created in the database
    */


    /*----------------------------------------------- REGISTER---------------------------------------------------*/


    function insertData($name, $email, $password, $address, $city, $mobile)
    {


        $stmt = "INSERT INTO `reg_form`(`user_name`, `email`, `password`, `address`, `city`, `mobile_no`) VALUES('$name','$email','$password','$address','$city','$mobile')";
        $data = $this->con->query($stmt);

        if ($data) {

            return true;
        } else {

            return false;
        }


    }


    /*-----------------------------------------------DONOR REGISTER---------------------------------------------------*/


    function insertDonorData($name, $email, $password, $address, $city, $group_id, $mobile, $aadhaar)
    {


        $stmt = "INSERT INTO `donor_reg_form`(`user_name`, `email`, `password`, `address`, `city`, `group_id`, `mobile_no`, `aadhaar_no`) VALUES('$name','$email','$password','$address','$city','$group_id','$mobile','$aadhaar')";

        $data = $this->con->query($stmt);

        if ($data) {

            return true;
        } else {

            return false;
        }


    }


    /*----------------------------------------------- LOGIN---------------------------------------------------*/


    function Login($email, $pwd)
    {


        $sql = "SELECT email,password FROM `reg_form` where email ='$email' and password = '$pwd'";
        $stmt = mysqli_query($this->con, $sql);

        $num = mysqli_num_rows($stmt);

        if ($num > 0) {

            return true;
        } else {

            return false;
        }


    }


    /*-----------------------------------------------DONOR LOGIN---------------------------------------------------*/


    function DonorLogin($email, $pwd)
    {


        $sql = "SELECT email,password FROM `donor_reg_form` where email ='$email' and password = '$pwd'";
        $stmt = mysqli_query($this->con, $sql);

        $num = mysqli_num_rows($stmt);

        if ($num > 0) {

            return true;
        } else {

            return false;
        }


    }

    /*----------------------------------------------- Update Profile---------------------------------------------------*/


    function UpdateProfile($id, $name, $email, $city, $mobile, $address)
    {

        $stmt = "UPDATE `reg_form` set `user_name` = '$name', `email` = '$email',`city` = '$city',mobile_no='$mobile',address='$address' where user_id = '$id'";
        $data = $this->con->query($stmt);

        if ($data) {

            return true;
        } else {

            return false;
        }


    }

    /*----------------------------------------------- Update Donor Profile---------------------------------------------------*/


    function UpdateDonorProfile($id, $mobile)
    {

        $stmt = "UPDATE `donor_reg_form` set mobile_no='$mobile' where donor_id = '$id'";
        $data = $this->con->query($stmt);

        if ($data) {

            return true;
        } else {

            return false;
        }


    }


    /*-------------------------------------------------------Get User Profile By ID -------------------------------------*/


    function getProfileByID($id)
    {

        $stmt = "SELECT * FROM `reg_form` where user_id = '$id'";
        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {


            $inner = array();
            $inner['user_name'] = $obj->user_name;
            $inner['email'] = $obj->email;
            $inner['address'] = $obj->address;
            $inner['city'] = $obj->city;
            $inner['mobile'] = $obj->mobile_no;

            array_push($outer, $inner);
        }

        return $outer;

    }


    /*-------------------------------------------------------Get Donor Profile By ID -------------------------------------*/


    function getDonorProfileByID($id)
    {

        $stmt = "SELECT * FROM `donor_reg_form` where donor_id = '$id'";
        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {


            $inner = array();
            $inner['user_name'] = $obj->user_name;
            $inner['email'] = $obj->email;
            $inner['address'] = $obj->address;
            $inner['city'] = $obj->city;
            $inner['mobile'] = $obj->mobile_no;
            $inner['aadhaar_no'] = $obj->aadhaar_no;

            array_push($outer, $inner);
        }

        return $outer;

    }


    /*----------------------------------------------- LOGIN DATA---------------------------------------------------*/


    function getLoginData($email, $pwd)
    {


        $stmt = "SELECT * FROM `reg_form` where email = '$email' and password = '$pwd'";
        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {


            $inner = array();
            $inner['user_id'] = $obj->user_id;
            $inner['user_name'] = $obj->user_name;
            $inner['email'] = $obj->email;
            $inner['password'] = $obj->password;
            $inner['city'] = $obj->city;
            $inner['wallet_amount'] = $obj->wallet_amount;
            $inner['flag'] = "customer";

            array_push($outer, $inner);
        }

        return $outer;
    }


    /*-----------------------------------------------DONOR LOGIN DATA---------------------------------------------------*/


    function getDonorLoginData($email, $pwd)
    {


        $stmt = "SELECT * FROM `donor_reg_form` where email = '$email' and password = '$pwd'";
        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {


            $inner = array();
            $inner['user_id'] = $obj->donor_id;
            $inner['user_name'] = $obj->user_name;
            $inner['email'] = $obj->email;
            $inner['password'] = $obj->password;
            $inner['city'] = $obj->city;
            $inner['group_id'] = $obj->group_id;
            $inner['is_approved'] = $obj->is_approved;
            $inner['flag'] = "donor";


            array_push($outer, $inner);
        }

        return $outer;
    }


    /*----------------------------------------------- Get Blood Group---------------------------------------------------*/


    function getBloodGroup()
    {


        $stmt = "SELECT * FROM `blood_group`";
        $data = mysqli_query($this->con, $stmt);

        $outer = array();

        while ($row = mysqli_fetch_assoc($data)) {
            $inner = array();

            $inner['group_id'] = $row['group_id'];
            $inner['group_name'] = $row['group_name'];

            array_push($outer, $inner);
        }

        return $outer;
    }


    /*----------------------------------------------- Get Request DATA---------------------------------------------------*/


    function getRequestData($uid)
    {


        $stmt = "SELECT cart.cart_id,blood_group.group_name,donor_reg_form.user_name,cart.is_approved,donor_reg_form.city,donor_reg_form.address,donor_reg_form.mobile_no FROM `cart`,donor_reg_form,blood_group where cart.group_id = blood_group.group_id and donor_reg_form.donor_id = cart.donor_id and cart.user_id = '$uid'";

        $data = mysqli_query($this->con, $stmt);

        $outer = array();

        while ($row = mysqli_fetch_assoc($data)) {
            $inner = array();

            $inner['cart_id'] = $row['cart_id'];
            $inner['group_name'] = $row['group_name'];
            $inner['donor_name'] = $row['user_name'];
            $inner['city'] = $row['city'];
            $inner['address'] = $row['address'];
            $inner['mobile'] = $row['mobile_no'];
            $inner['is_approved'] = $row['is_approved'];

            array_push($outer, $inner);
        }

        return $outer;
    }


    /*-------------------------------------------- Get Request DATA For Donor---------------------------------------------*/


    function getRequestDataForDonor($uid)
    {


        $stmt = "SELECT cart.cart_id,blood_group.group_name,reg_form.user_name,reg_form.city,reg_form.mobile_no FROM `cart`,reg_form,blood_group where cart.group_id = blood_group.group_id and reg_form.user_id = cart.user_id and cart.donor_id = '$uid'";

        $data = mysqli_query($this->con, $stmt);

        $outer = array();

        while ($row = mysqli_fetch_assoc($data)) {
            $inner = array();

            $inner['cart_id'] = $row['cart_id'];
            $inner['group_name'] = $row['group_name'];
            $inner['user_name'] = $row['user_name'];
            $inner['mobile'] = $row['mobile_no'];
            $inner['city'] = $row['city'];

            array_push($outer, $inner);
        }

        return $outer;
    }

    /*----------------------------------------------- Get WALLET DATA---------------------------------------------------*/


    function getWallet($uid)
    {


        $stmt = "SELECT wallet_amount FROM reg_form where user_id = '$uid'";
        $data = mysqli_query($this->con, $stmt);

        $outer = array();

        while ($row = mysqli_fetch_assoc($data)) {
            $inner = array();

            $inner['wallet_amount'] = $row['wallet_amount'];

            array_push($outer, $inner);
        }

        return $outer;
    }

    /*------------------------------------------ Get Blood Group List By Id----------------------------------------------*/


    function getBloodGroupListById($user_id, $group_id)
    {


        $sql = "SELECT city from reg_form where user_id = '$user_id'";
        $exe = $this->con->query($sql);
        $obj = $exe->fetch_object();

        // $address = $obj->address;
        $city = $obj->city;


        $stmt = "SELECT * FROM `blood_bank_data`,blood_bank,blood_group where blood_bank_data.bb_id = blood_bank.bb_id and blood_bank_data.group_id = blood_group.group_id and blood_group.group_id = '$group_id' ORDER BY blood_bank.bb_city = '$city' DESC";


        $stmt = "SELECT * from donor_reg_form where group_id = '$group_id' and is_approved = '1' and city='$city'";

        $data = mysqli_query($this->con, $stmt);

        $outer = array();

        while ($row = mysqli_fetch_assoc($data)) {
            $inner = array();

            $inner['donor_id'] = $row['donor_id'];
            $inner['donor_name'] = $row['user_name'];
            $inner['address'] = $row['address'];
            $inner['city'] = $row['city'];

            array_push($outer, $inner);
        }

        return $outer;
    }


    /*----------------------------------------------- PAY---------------------------------------------------*/


    function Pay($user_id, $id)
    {


        $q = "SELECT wallet_amount from reg_form where user_id = '$user_id'";
        $exe = $this->con->query($q);
        $obj = $exe->fetch_object();
        $wallet_amount = $obj->wallet_amount;

        $sql = "UPDATE cart SET is_purchased = 1 WHERE cart_id = '$id'";
        $stmt = mysqli_query($this->con, $sql);


        $sql2 = "SELECT total FROM `cart` where cart_id='$id'";
        $exe2 = $this->con->query($sql2);
        $row = $exe2->fetch_object();


        $amount_to_pay = $row->total;

        $final_amount = $wallet_amount - $amount_to_pay;

        $this->con->query("UPDATE reg_form set wallet_amount = '$final_amount' where user_id = '$user_id'");

        if ($stmt) {
            return true;
        } else {

            return false;
        }


    }


    /*----------------------------------------------- Add Amount to Wallet---------------------------------------------------*/


    function AddAmount($user_id, $amount)
    {


        $q = "SELECT wallet_amount from reg_form where user_id = '$user_id'";
        $exe = $this->con->query($q);
        $obj = $exe->fetch_object();
        $wallet_amount = $obj->wallet_amount;

        $final_amount = $wallet_amount + $amount;
        $sql = "UPDATE reg_form SET wallet_amount = '$final_amount' WHERE user_id = '$user_id'";
        $stmt = mysqli_query($this->con, $sql);

        if ($stmt) {
            return true;
        } else {

            return false;
        }


    }

    /*----------------------------------------------- Change User Password---------------------------------------------------*/


    function ChangeUserPwd($old, $new, $id)
    {


        $sql = "select user_id from reg_form where password='$old'";
        $stmt = mysqli_query($this->con, $sql);

        $num = mysqli_num_rows($stmt);


        if ($num > 0) {

            $sql = "UPDATE reg_form SET password = '$new' WHERE password = '$old' and user_id = '$id'";
            $stmt = mysqli_query($this->con, $sql);


            return true;
        } else {

            return false;
        }


    }


    /*----------------------------------------------- Change Donor Password---------------------------------------------------*/


    function ChangeDonorPwd($old, $new, $id)
    {


        $sql = "select donor_id from donor_reg_form where password='$old'";
        $stmt = mysqli_query($this->con, $sql);

        $num = mysqli_num_rows($stmt);


        if ($num > 0) {

            $sql = "UPDATE donor_reg_form SET password = '$new' WHERE password = '$old' and donor_id = '$id'";
            $stmt = mysqli_query($this->con, $sql);


            return true;
        } else {

            return false;
        }


    }


    /*-----------------------------Request to Purchase---------------------------------*/

    function RequestToPurchase($uid, $donor_id, $group_id)
    {

        $sql = "SELECT cart_id FROM `cart` where user_id = '$uid' and group_id = '$group_id' and donor_id='$donor_id' and is_approved = 0";
        $data = $this->con->query($sql);
        $num = mysqli_num_rows($data);


        if ($num > 0) {

            return 2;
        }


        $query = "INSERT INTO `cart`( `user_id`, `qty`, `donor_id`, `group_id`) VALUES('$uid','1','$donor_id','$group_id')";

        if ($this->con->query($query)) {
            return 0;
        } else {

            return 1;
        }


    }


}