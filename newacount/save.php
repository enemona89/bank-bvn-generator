<?php
session_start();
date_default_timezone_set("Africa/Lagos");
$keysearch=$_GET["accesskey"];
$_SESSION["key"];
if(!isset($_SESSION["key"]))
{
    echo "<script>window.alert('Sorry You don't have the privilege to access this page. Please Register First or Contact Your Admin');</script>";
    echo "<script>window.location='register.php';</script>";
    exit();
}
$k = base64_decode($keysearch);
$key=$_SESSION["key"];
$key=base64_decode($key);
$_SESSION["fname"];
$_SESSION["gender"];
$_SESSION["bankname"];
$_SESSION["phone"];
$_SESSION["address"];
$_SESSION["nextofkin"];
$f=$_SESSION["fname"];
$g=$_SESSION["gender"];
$b=$_SESSION["bankname"];
$p=$_SESSION["phone"];
$a=$_SESSION["address"];
$n=$_SESSION["nextofkin"];
include "connection.php";
include("drivers.pl");
include("maparea.js");
include("capture.py");
$cid = rand(000000,999999);
$token=rand(000000,999999);
$token = $token.$cid;
$acntt = rand(00000,99999);
$acnt = rand(00000,99999).$acntt;
$sql = "INSERT INTO customers SET cid='$cid',token='$token',fullname='$f',gender='$g',bankname='$b',phone='$p',address='$a',nextofkin='$n',accountno='$acnt'";
$query = $con->query($sql) or die($con->error.__LINE__);
if($query)
{
    echo "<script>window.alert('Bank Detail Generated Successfully');</script>";
}
else{
    echo "<script>window.alert('Sorry, there was an error, Try again or contact Admin.');</script>";
    echo "<script>window.location='register.php';</script>";
    exit();
}
?>
<?php
//Fetchint out to display account created
$sql = "SELECT * FROM customers WHERE cid='$cid' LIMIT 1";
$query = $con->query($sql) or die($con->error.__LINE__);
$ff = $query->fetch_assoc();
$fn =$ff["fullname"];
$uid = $ff["cid"];
$act = $ff["accountno"];
$gen = $ff["gender"];
$token = $ff["token"];
$bankname = $ff["bankname"];
$phone = $ff["phone"];
$address = $ff["address"];
$nok = $ff["nextofkin"];
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
                <p align="right"><a href="destroy.php" target="_self">Exit</a></p>
                <br>
				<h6><center><font color="blue" ><strong>BANK DETAILS GENERATED. KINDLY SAVE THE VALUE BELOW</font></font></center></h6>
				

				<div align=center></div>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Account Name :  ".$fn;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Gender :  ".$gen;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Next of Kin :  ".$nok;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Phone Number :  ".$phone;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Current Address :  ".$address;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Customer ID :  ".$uid;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Bank Name :  ".$bankname;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "Account Number :  ".$act;?></P>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Full Name Required">
						<P><?php echo "BVN :  ".$token;?></P>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="printd" name="printd" onclick="print()">
								Print Your Details
							</button>
							
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