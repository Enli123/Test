
<!DOCTYPE html>
<html lang="en">
	<?php
include('config.php');

  		   
						

if(isset($_GET['Aproval'])){  
                       $id=$_GET['Aproval'];
					 $select_query= "update cart set is_approved=1 where cart_id=$id";
                      $result =  mysqli_query($conn,$select_query);
		 
	 if($result){ 
					
		 	echo"<script>window.open('request.php?status','_self')</script>";	
			}
	       }
		   
		   
if(isset($_GET['Reject'])){
                   
                       $id=$_GET['Reject'];
					  $select_query= "update cart set is_approved=2 where cart_id=$id";
                      $result =  mysqli_query($conn,$select_query);
	 if($result){
					  echo"<script>window.open('request.php?delt','_self')</script>";	
			}
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
   Verify Donors
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
                          <span><b>Approved </b></span>
                        </div>						
						</div>	
						<div id="update"> 
							<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Role Update</b></span>
                        </div>						
						</div>
						<div id="delt"> 
							<div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b>Reject </b></span>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Donors List</h4>
              </div>
              <div class="card-body">
                <div class="table">
	
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Sr.no</th>
                      <th>Donor Name </th> 
                      <th>Donor Email </th> 
					   <th>Donor Unique No. </th> 
					   <th>Donor City </th> 
 					   <th>Blood Group </th> 
					  <th>Status</th>   
                     
                    </thead>
                    <tbody>
													<?php
													include ('config.php');
    $query = "SELECT * FROM `donor_reg_form` rf,blood_group bg where rf.group_id = bg.group_id";
    $run_query = mysqli_query($conn, $query);
    $count=0;
            while($row = mysqli_fetch_array($run_query)){
		
        ?>
                      <tr>
					 <td><?php echo ++$count;?></td>
           <td><?php echo $row['user_name'];?></td> 
      	  <td><?php echo $row['email'];?></td>  
      	  <td><?php echo $row['aadhaar_no'];?></td>   
          <td><?php echo $row['city'];?></td>   
          <td><?php echo $row['group_name'];?></td>   
	  		  
 
	 <td> 

		<?php if($row['is_approved']==0){?>	
		
		<a href="verify.php?Aproval=<?php echo $row['donor_id'];?>"  class="btn btn-success" onclick="return fun()"> Accept </a>
					  
		<a href="verify.php?Reject=<?php echo $row['donor_id'];?>"  class="btn btn-danger" onclick="return fun()"> Reject </a> 
							  
		<?php } if($row['is_approved']==1)echo 'Approved';  ?>	
		
		<?php if($row['is_approved']==2)echo 'Rejected';  ?>	
		 																				
	</td>
	
                      </tr>
					  
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

<script type="text/javascript">
  

  function fun(){

      return confirm('Are you sure?');
  }
</script>