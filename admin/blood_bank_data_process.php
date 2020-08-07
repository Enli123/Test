<?php include('config.php');

if($_POST['reg']=='submit')
	{
		$bb_id= $_POST['bankname'];
		$group_id= $_POST['groupid'];
		$price= $_POST['price'];
		
	 $sql="INSERT INTO blood_bank_data(bb_id,group_id,price)VALUES('$bb_id','$group_id','$price')";
$result = mysqli_query($conn,$sql);
	//echo $sql;
 if($result)
	{
			//echo "<script>alert('States Add Successfully')</script>";
			//echo"<script>window.open('state.php','_self')</script>";	
		header("Location: blood_bank_data.php?status"); 
} 
    else
    {
		echo "<script>alert(' Unsuccessfully Add States ')</script>";
			echo"<script>window.open('blood_bank_data.php','_self')</script>";
	}
	}
?>