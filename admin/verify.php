<?php 

include 'config.php';

if(isset($_GET['Aproval'])){

	 $id=$_GET['Aproval'];
	 $select_query= "update donor_reg_form set is_approved=1 where donor_id=$id";
     $result =  mysqli_query($conn,$select_query);

     header('location:verify_donors.php');

}


if(isset($_GET['Reject'])){

	$id=$_GET['Reject'];
 	$select_query= "update donor_reg_form set is_approved=2 where donor_id=$id";
    $result =  mysqli_query($conn,$select_query);

     header('location:verify_donors.php');

}

?>