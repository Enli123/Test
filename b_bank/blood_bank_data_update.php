

<?php 
include('config.php');

if($_POST['reg']=='submit')
	{
	$data_id = $_POST['data_id'];
	$price = $_POST['price'];
	$group = $_POST['groupid'];
	$bank = $_POST['bank'];
	
	//echo "<script>alert('$country')</script>"; 
	mysqli_query($conn,"update blood_bank_data set bb_id='$bank',group_id='$group',price='$price' where data_id='$data_id'")or die(mysqli_error());
	
	
	//echo "<script>document.location='state.php'</script>";  
		header("Location: blood_bank_data.php?update"); 
}
	
?>
