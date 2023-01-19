<?php
//Looking up for scanner drivers drivers
include("drivers.pl");
include("maparea.js");
include("capture.py");
$fname=$_POST["fn"];
$gender = $_POST["gen"];
$bankname = $_POST["bnk"];
$phone = $_POST["phn"];
$address = $_POST["add"];
$nextofkin = $_POST["nk"];

$_SESSION["fname"]=$fname;
$_SESSION["gender"]=$gender;
$_SESSION["bankname"]=$bankname;
$_SESSION["phone"]=$phone;
$_SESSION["address"]=$address;
$_SESSION["nextofkin"]=$nextofkin;
$key = "a76dtey5398h0981766554332209jugk987db388877Hg36FFRe#wqAayteRTiJuHgfdtrewqPolk986654341029876543326598762";
$_SESSION["key"]=$key;
echo "<script>

if (confirm('No SecuGen0041 Driver Found on your device. Click Ok to proceed with AUTO+PIN AS TOKEN or cancel to install Biometrics SecuGen0041 scanner to proceed?')) {
    // Save it!
  
  window.location='save.php';
  } else {
    // Do nothing!
    console.log('Thing was not saved to the database.');
  };</script>";

?>