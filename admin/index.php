
<!DOCTYPE html>
<html lang="en">
 

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
  <title>
    Login
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

<body class=""><br><br><br><br><br><br>
  <div class="row">
		  <div class="col-md-4"> </div>
          <div class="col-md-4"> 
  <div class="content" style="">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-user" style="width:330px; background-color:#e8dfdf;">
              <div class="card-header">
                <h5 class="card-title">Admin Login</h5>
              </div>
              <div class="card-body">
                <form action="login_process.php" method="POST">

  
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group"><br>
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="username">
						<label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="pass">
					 </div>
                    </div>  
				  </div>
                          <input type="submit" class="btn btn--radius-2 btn--blue"  name="reg" value="login">            
             
                </form>
              </div>
            </div>
          </div>
        </div>
 
      </div>
  

		  </div>
          <div class="col-md-4">  </div>
         
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
