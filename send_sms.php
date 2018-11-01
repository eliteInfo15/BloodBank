<?php
	// Authorisation details.
	$username = "eliteinfo15@gmail.com";
	$hash = "77b1bd6113e4b9c0c7cdf285b63f2c7f91aa363745b2b1ce1117fd89dc06b414";
    $phone=$_GET["phone"];
    $name=$_GET["name"];
    $donor_phone=$_GET["donor_phone"];
    $donor_name=$_GET["donor_name"];
    // $voter_phone="7000221871";
    //$voter_name="demo";
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "91".$phone; // A single number or a comma-seperated list of numbers

// Create a string of all alpha characters and randomly shuffle them
$alpha   = str_shuffle('ABCDEFGHJ0317KLMNOPQRSTUVWXYZab96cde2548fghjklmnopqrstuvwxyz');

// Create a string of all numeric characters and randomly shuffle them


// Grab the 4 first alpha characters + the 2 first numeric characters
$code = substr($alpha, 0, 4);

// Shuffle the code to get the alpha and numeric in random positions
$otp = str_shuffle($code);




	$message = "Hi ".$name.", ".$donor_name." wants to donate you blood contact him on ".$donor_phone;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	echo $otp;
	
	curl_close($ch);
?>