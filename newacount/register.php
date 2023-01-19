<?php
session_start();
$keysearch=$_GET["accesskey"];
$_SESSION["key"];
$k = base64_decode($keysearch);
$key=$_SESSION["key"];
$key=base64_decode($key);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>:-Account Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/0.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


	<!-- jQuery + Bootstrap -->

<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Confirmation Modal -->
<script src="src/js/bootstrap-confirmation-modal.min.js"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="post" enctype="multipart/form-data">
				<p align="right"><a href="../index.html" target="_self">Home</a></p>
                <br>
				<h6><center><font color="blue" ><strong>Enter your details below to Generate BVN</font></font></center></h6>
				

				<div align=center></div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<input class="input100" type="text" name="fn" id="fn" placeholder="Enter Your Full Name" required >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Gender Required">
						
						<select class="input100"  name="gen" id="gen" required>
						<option value="">Select Gender</option>
						<option>Female</option>
						<option>Male</option>
						</select>
						<span class="focus-input100" data-symbol="&#xf156;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Bank Name Needed">
						
						<select class="input100"  name="bnk" id="bnk" required>
						<option value="">Select Bank</option>
						<option>First Bank PLC</option>
						<option>Zenith Bank</option>
						<option>United Bank of Africa </option>
						<option>Access Bank</option>
						<option>Union Bank</option>
						</select>
						<span class="focus-input100" data-symbol="&#xf156;"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Phone Required">
						<input class="input100" type="text" name="phn" id="phn" placeholder="Enter Phone Number" pattern="^[0-9]*$" required >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Your Address Needed">
						<input class="input100" type="text" name="add" id="add" placeholder="Enter Address" required >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
		<div class="wrap-input100 validate-input m-b-23" data-validate = "Next of Kin Required">
						<input class="input100" type="text" name="nk" id="nk" placeholder="Enter Next of Kin" required >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="scan" name="scan">
								Save and Capture Finger
							</button>
							<?php
							if(isset($_POST['scan']))
							{
								include("biometrics.php");
							}
							?>
						</div>
						
					</div>
					
					<div class="container-login100-form-btn">
					<P align="center"><font color = "#000" size="-5">Designed by: Iroanwusi Chukwumeka Gift | Reg: IAUE/2019/COM/MSC/0020</font></P>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--Credit:colorlib -->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>


	<script src="js/main.js"></script>

</body>
</html>