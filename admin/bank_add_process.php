<?php include('config.php');

if($_POST['reg']=='submit')
	{
		$bb_address= $_POST['bb_address'];
		$bb_city= $_POST['bb_city'];
		$bb_name= $_POST['bb_name'];
		
	 $sql="INSERT INTO blood_bank(bb_name,bb_city,bb_address)VALUES('$bb_name','$bb_city','$bb_address')";
$result = mysqli_query($conn,$sql);
	//echo $sql;
 if($result)
	{
			//echo "<script>alert('designation  Add Successfully')</script>";
		//	echo"<script>window.open('designation.php','_self')</script>";	
				header("Location: bank_add.php?status");
} 
    else
    {
		echo "<script>alert(' Unsuccessfully Add Bank ')</script>";
			echo"<script>window.open('bank_add.php','_self')</script>";
	}
	}
?>