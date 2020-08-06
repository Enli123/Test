

<?php 
include('config.php');

if($_POST['reg']=='submit')
	{
	$bb_id = $_POST['bb_id'];
	$bb_name= $_POST['bb_name'];
	$bb_city= $_POST['bb_city'];
	$bb_address= $_POST['bb_address'];
	
	mysqli_query($conn,"update blood_bank set bb_name='$bb_name',bb_city='$bb_city' ,bb_address='$bb_address' where bb_id='$bb_id'")or die(mysqli_error());
	
	
//	echo "<script>document.location='designation.php'</script>";  
		header("Location: bank_add.php?update");
}
	
?>
