
<!DOCTYPE html>
<html lang="en">
	<?php
include('config.php');
if (isset($_GET['delete'])){
$data_id = $_GET['delete'];
  $query = "DELETE FROM blood_bank_data WHERE data_id= '$data_id'";
    $run_query = mysqli_query($conn, $query);
	
header("location:blood_bank_data.php?delt");
}
?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
  <title>
    Blood Bank Data
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
 	<?php include ('left_menu.php');
?>

    <div class="main-panel">
      <!-- Navbar -->
<?php include ('top_menu.php');
?>

<!-- Flash Error Messages  -->
						<div id="popup"> 
							<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Blood Bank Data Add successfully </b></span>
                        </div>						
						</div>	
						<div id="update"> 
							<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Blood Bank Data Update Successfully </b></span>
                        </div>						
						</div>
						<div id="delt"> 
							<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Blood Bank Data Delete  Successfully </b></span>
                        </div>						
						</div>
					
  <?php
 	if (isset($_GET['status']))
{
     echo '
       <script type="text/javascript">
         function hideMsg()
         {
            document.getElementById("popup").style.visibility = "hidden";
         }

         document.getElementById("popup").style.visibility = "visible";
         window.setTimeout("hideMsg()", 2000);
       </script>';
    }
		if (isset($_GET['update']))
   {
     echo '
       <script type="text/javascript">
         function hideMsg()
         {
            document.getElementById("update").style.visibility = "hidden";
         }

         document.getElementById("update").style.visibility = "visible";
         window.setTimeout("hideMsg()", 2000);
       </script>';
    }
	if (isset($_GET['delt']))
  {
     echo '
       <script type="text/javascript">
         function hideMsg()
         {
            document.getElementById("delt").style.visibility = "hidden";
         }

         document.getElementById("delt").style.visibility = "visible";
         window.setTimeout("hideMsg()", 2000);
       </script>';
    }
?>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Blood Bank Data</h5>
              </div>
              <div class="card-body">
                <form action="blood_bank_data_process.php" method="POST">

   <div class="row">
	  <div class="col-md-6 pr-1">  
    <select name="bankname" class="form-control" id="country">
        <option value="">Select Bank</option>
        <?php
		include('config.php');
    $query = "SELECT * FROM blood_bank";
    $run_query = mysqli_query($conn, $query);
	$count = mysqli_num_rows($run_query);
    
        if($count > 0){
            while($row = mysqli_fetch_array($run_query)){
				$bb_id=$row['bb_id'];
				$bb_name=$row['bb_name'];
                echo "<option value='$bb_id'>$bb_name</option>";
            }
        }else{
            echo '<option value="">Bank not available</option>';
        }
        ?>
    </select>
	</div>
	</div>
	   <div class="row">
	  <div class="col-md-6 pr-1"> 
	   <label>Select Blood Group</label>
    <select name="groupid" class="form-control" id="country">
        <option value="">Select Blood Group</option>
        <?php
		include('config.php');
    $query = "SELECT * FROM blood_group";
    $run_query = mysqli_query($conn, $query);
	$count = mysqli_num_rows($run_query);
    
        if($count > 0){
            while($row = mysqli_fetch_array($run_query)){
				$group_id=$row['group_id'];
				$group_name=$row['group_name'];
                echo "<option value='$group_id'>$group_name</option>";
            }
        }else{
            echo '<option value="">Group not available</option>';
        }
        ?>
    </select>
	</div>
	</div>
	
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Price" name="price">
                          <input type="submit" class="btn btn--radius-2 btn--blue"  name="reg" value="submit">            
					 </div>
                    </div>  
				  </div>
             
                </form>
              </div>
            </div>
          </div>
        </div>
		        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Blood Bank Data</h4>
              </div>
              <div class="card-body">
                <div   >
	
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Sr.no </th>
                      <th>Bank Name</th> 
					   <th>Group</th> 
					  <th>Price</th> 
					  <th>Delete</th> 
					  <th>Edit</th>
                     
                    </thead>
                    <tbody>
													<?php
													include ('config.php');
    $query = "SELECT * FROM blood_bank_data";
    $run_query = mysqli_query($conn, $query);
$count=0;
            while($row = mysqli_fetch_array($run_query)){
		
        ?>
                      <tr>
					  <td><?php echo ++$count;?></td>
                      
					   <td><?php  $bb_id=$row['bb_id'];
					     $query2 = "SELECT * FROM blood_bank where bb_id='$bb_id'";
						$run_query2 = mysqli_query($conn, $query2);
  
            while($row2 = mysqli_fetch_array($run_query2)){
				echo $row2['bb_name'];
		}
					    ?></td> 
						
						   <td><?php  $group_id=$row['group_id'];
					     $query3 = "SELECT * FROM blood_group where group_id='$group_id'";
						$run_query3 = mysqli_query($conn, $query3);
  
            while($row3 = mysqli_fetch_array($run_query3)){
				echo $row3['group_name'];
		}
					    ?></td> 
                      <td><?php echo $row['price'];?></td>  
					 	<td>										
	<a href="blood_bank_data.php?delete=<?php echo $row['data_id'];?>"  onclick="return confirm('Are You Sure Delete ?');">

		<i class="fa fa-trash" style="font-size:25px" aria-hidden="true"></i>
		<div class="clearfix"></div>
</td>
<td>
<a href="#myModal<?php echo $row['data_id'];?>"  data-toggle="modal" data-target="#myModal<?php echo $row['data_id'];?>"><i class="fa fa-edit" style="font-size:25px" aria-hidden="true"></i>
</a>
</td>
                      </tr>
					    <!-- Modal content-start--->
  <div class="modal fade" id="myModal<?php echo $row['data_id'];?>" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
       
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="blood_bank_data_update.php" enctype='multipart/form-data'>
	 
   <div class="row">
	  <div class="col-md-6 pr-1"> 
	  <label>Bank Name</label>
    <select name="bank" class="form-control" >
          <?php
    include('config.php');
     
    $query1 = "SELECT * FROM blood_bank";
    $run_query1 = mysqli_query($conn, $query1); 
	$count1 = mysqli_num_rows($run_query1);
            while($row1 = mysqli_fetch_array($run_query1)){
				$bb_id=$row1['bb_id'];
				$bb_name=$row1['bb_name'];
				?>
			<option   value="<?php echo $row1['bb_id'];?>"
               
			<?php if($row['bb_id']==$bb_id)echo 'selected';?>>
			<?php echo $bb_name;?>
		</option><?php
	        }
        ?>
    </select>
	</div>
		  <div class="col-md-6 pr-1"> 
	  <label>Group</label>
    <select name="groupid" class="form-control" >
          <?php
    include('config.php');
     
    $query1 = "SELECT * FROM blood_group";
    $run_query1 = mysqli_query($conn, $query1); 
	$count1 = mysqli_num_rows($run_query1);
            while($row1 = mysqli_fetch_array($run_query1)){
				$group_id=$row1['group_id'];
				$group_name=$row1['group_name'];
				?>
			<option   value="<?php echo $row1['group_id'];?>"
               
			<?php if($row['group_id']==$group_id)echo 'selected';?>>
			<?php echo $group_name;?>
		</option><?php
	        }
        ?>
    </select>
	</div>
	</div>	
		  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
				
                        <label>Price</label>
                        <input type="hidden"  value="<?php echo $row['data_id'];?>" name="data_id">
                        <input type="text" class="form-control"  value="<?php echo $row['price'];?>" name="price">
                          <input type="submit" class="btn btn--radius-2 btn--blue"  name="reg" value="submit">            
					 </div>
                    </div>  
				  </div>
				   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
	 </div>
	</div>
        <!-- Modal end content-->    
                   <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
 
      </div>
       
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>
