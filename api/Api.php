<?php 

	//getting the dboperation class
	require_once '../includes/DbOperation.php';

	//function validating all the paramters are available
	//we will pass the required parameters to this function 
	function isTheseParametersAvailable($params){
		//assuming all parameters are available 
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		//if parameters are missing 
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
			//displaying error
			echo json_encode($response);
			
			//stopping further execution
			die();
		}
	}
	
	
	
	
	
	//an array to display response
	$response = array();
	
	//if it is an api call 
	//that means a get parameter named api call is set in the URL 
	//and with this parameter we are concluding that it is an api call
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
		 
			case 'register':

 			isTheseParametersAvailable(array('name','email','pwd','address','city','mobile_no'));
			 $db = new DbOperation();
				
 			$result = $db->insertData(
						$_POST['name'],
						$_POST['email'],
						$_POST['pwd'],
						$_POST['address'],
						$_POST['city'],
  						$_POST['mobile_no']
						);
				

 				if($result){

 					$response['error'] = false; 
					$response['message'] = 'Regitered successfully';
 
				}else{

 					$response['error'] = true; 
					$response['message'] = 'Some error occurred please try again';
				}
				
			break; 
			
/*--------------------------------Donour Register------------------------------------*/

case 'donor_register':

 			// isTheseParametersAvailable(array('name','email','pwd','city'));
 			isTheseParametersAvailable(array('name','email','pwd','address','city','group_id','mobile_no','aadhaar_no'));
			 $db = new DbOperation();
				
 			$result = $db->insertDonorData(
						$_POST['name'],
						$_POST['email'],
						$_POST['pwd'],
						$_POST['address'],
 						$_POST['city'],
						$_POST['group_id'],
						$_POST['mobile_no'],
						$_POST['aadhaar_no']
						);
				

 				if($result){

 					$response['error'] = false; 
					$response['message'] = 'Regitered successfully';
 
				}else{

 					$response['error'] = true; 
					$response['message'] = 'Some error occurred please try again';
				}
				
			break; 

			
			
/*----------------------------------------------- LOGIN---------------------------------------------------*/
	
			
			case 'login':
			
			isTheseParametersAvailable(array('email','pwd'));
			$db = new DbOperation();
			$result = $db->Login($_POST['email'],$_POST['pwd']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Login successfully';
 					 

					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'email or Password is Invalid';
					
 				}
			break; 
	
/*-----------------------------------------------DONOR LOGIN---------------------------------------------------*/
	
			
			case 'donor_login':
			
			isTheseParametersAvailable(array('email','pwd'));
			$db = new DbOperation();
			$result = $db->DonorLogin($_POST['email'],$_POST['pwd']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Login successfully';
 					 

					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'email or Password is Invalid';
					
 				}
			break; 


/*-----------------------------------------Update Profile---------------------------------------------*/


case 'update':

 			isTheseParametersAvailable(array('id','name','email','city','mobile','address'));
			 $db = new DbOperation();
				
 			$result = $db->UpdateProfile(
						$_POST['id'],
						$_POST['name'],
						$_POST['email'],
						$_POST['city'],
						$_POST['mobile'],
						$_POST['address']
						);
				

 				if($result){

 					$response['error'] = false; 
					$response['message'] = 'Profile Updated successfully';
 
				}else{

 					$response['error'] = true; 
					$response['message'] = 'Some error occurred please try again';
				}
				
			break; 


/*-----------------------------------------Update Donor Profile---------------------------------------------*/


case 'update_donor_profile':

 			isTheseParametersAvailable(array('id','mobile'));
			 $db = new DbOperation();
				
 			$result = $db->UpdateDonorProfile(
						$_POST['id'],
						$_POST['mobile']
					);
				

 				if($result){

 					$response['error'] = false; 
					$response['message'] = 'Profile Updated successfully';
 
				}else{

 					$response['error'] = true; 
					$response['message'] = 'Some error occurred please try again';
				}
				
			break;			

	
/*----------------------------------------------- PAY---------------------------------------------------*/
	
			
			case 'pay':
			
			isTheseParametersAvailable(array('cart_id','user_id'));
			$db = new DbOperation();
			$result = $db->Pay($_POST['user_id'],$_POST['cart_id']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Paid successfully';
 					 

					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'email or Password is Invalid';
					
 				}
			break; 


/*----------------------------------------------- Add Amount---------------------------------------------------*/
	
			
			case 'add_amount':
			
			isTheseParametersAvailable(array('user_id','amount'));
			$db = new DbOperation();
			$result = $db->AddAmount($_POST['user_id'],$_POST['amount']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Added successfully';
 					 

					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'email or Password is Invalid';
					
 				}
			break; 

/*----------------------------------------------- GET Profile Data---------------------------------------------------*/
	
			
			case 'get_profile_data':
			
			isTheseParametersAvailable(array('user_id'));
			$db = new DbOperation();
 			
			 		$response['error'] = false; 
 					$response['records'] = $db->getProfileByID($_POST['user_id']);
					 
  
			break; 	


/*----------------------------------------------- GET Donor Profile Data---------------------------------------------------*/
	
			
			case 'get_donor_profile_data':
			
			isTheseParametersAvailable(array('user_id'));
			$db = new DbOperation();
 			
			 		$response['error'] = false; 
 					$response['records'] = $db->getDonorProfileByID($_POST['user_id']);
					 
  
			break; 	

/*----------------------------------------------- GET WALLET AMOUNT---------------------------------------------------*/
	
			
			case 'wallet':
			
			isTheseParametersAvailable(array('user_id'));
			$db = new DbOperation();
 			
			 
			 
					 
					$response['error'] = false; 
 					$response['records'] = $db->getWallet($_POST['user_id']);
					 
  
			break; 	

	/*----------------------------------------------- LOGIN DATA---------------------------------------------------*/
	
			
			case 'login_data':
			
			isTheseParametersAvailable(array('email','pwd'));
			$db = new DbOperation();
 			
			 
			 
					 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched';
					$response['records'] = $db->getLoginData($_POST['email'],$_POST['pwd']);
					 
  
			break; 		 
	
	/*----------------------------------------------- LOGIN DATA---------------------------------------------------*/
	
			
			case 'donor_login_data':
			
			isTheseParametersAvailable(array('email','pwd'));
			$db = new DbOperation();
 			
			 
			 
					 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched';
					$response['records'] = $db->getDonorLoginData($_POST['email'],$_POST['pwd']);
					 
  
			break; 			

/*----------------------------------------------- GET Blood Group---------------------------------------------------*/
	
			
			case 'get_blood_group':


 			$db = new DbOperation();
 			
			  		$response['error'] = false; 
 					$response['records'] = $db->getBloodGroup();
					 
  
			break; 				


/*----------------------------------------------- GET Blood Group---------------------------------------------------*/
	
			
			case 'get_blood_group_list_by_id':
		
			isTheseParametersAvailable(array('user_id','group_id'));

 			$db = new DbOperation();
 			
			  		$response['error'] = false; 
 					$response['records'] = $db->getBloodGroupListById($_POST['user_id'],$_POST['group_id']);
					 
  
			break; 	


/*----------------------------------------------- GET Request Data---------------------------------------------------*/
	
			
			case 'get_request_data':
		
			isTheseParametersAvailable(array('user_id'));

 			$db = new DbOperation();
 			
			  		$response['error'] = false; 
 					$response['records'] = $db->getRequestData($_POST['user_id']);
					 
  
			break; 	


/*----------------------------------------------- GET Request Data For Donor------------------------------------------*/
	
			
			case 'get_request_data_for_donor':
		
			isTheseParametersAvailable(array('donor_id'));

 			$db = new DbOperation();
 			
			  		$response['error'] = false; 
 					$response['records'] = $db->getRequestDataForDonor($_POST['donor_id']);
					 
  
			break; 	

/*----------------------------------------------- Request for Purchase---------------------------------------------------*/
	
			
			case 'request_to_purchase':
			
			isTheseParametersAvailable(array('user_id','donor_id','group_id'));
			$db = new DbOperation();
			$result = $db->RequestToPurchase($_POST['user_id'],$_POST['donor_id'],$_POST['group_id']);
			
			 
				if($result == 0){
					 
					$response['error'] = false; 
					$response['message'] = 'Request sent successfully';
 					 

					
					}

				else if($result == 2){
					 
					$response['error'] = true; 
					$response['message'] = 'Already requested for this.';
 					 

					
					}
					else{

 					$response['error'] = true; 
					$response['message'] = 'Something went wrong';
					
 				}
	break; 	
			
/*----------------------------------------------- Change User Password---------------------------------------------------*/
	
			
			 	case 'change_user_pwd':
			
			isTheseParametersAvailable(array('old','newpwd','id'));
			$db = new DbOperation();
			$result = $db->ChangeUserPwd($_POST['old'],$_POST['newpwd'],$_POST['id']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Password Updated successfully';
					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'Old Password is wrong';
				}
			break; 

/*----------------------------------------------- Change Donor Password---------------------------------------------------*/
	
			
			 	case 'change_donor_pwd':
			
			isTheseParametersAvailable(array('old','newpwd','id'));
			$db = new DbOperation();
			$result = $db->ChangeDonorPwd($_POST['old'],$_POST['newpwd'],$_POST['id']);
			
			 
				if($result){
					 
					$response['error'] = false; 
					$response['message'] = 'Password Updated successfully';
					
					}else{

 					$response['error'] = true; 
					$response['message'] = 'Old Password is wrong';
				}
			break; 			
	 		
		}
		
	}else{
		//if it is not api call 
		//pushing appropriate values to response array 
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	//displaying the response in json structure 
	echo json_encode($response);