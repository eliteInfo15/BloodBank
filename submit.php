<?php 
session_start();
$fname=$_POST["first_name"];
$GLOBALS['fnm']=$fname;
$lname=$_POST["last_name"];
$username=$_POST["username"];
$password=$_POST["Password"];
$mail=$_POST["email"];
$phone=$_POST["phone"];
$city=$_POST['city'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['blood_group'];
$conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
$qry="insert into donor values('".$fname."','".$lname."','".$username."','".$password."','".$mail."','".$phone."','".$city."','".$gender."','".$bloodgroup."')";
$qr="insert into login_info values('".$username."','".$password."')";
$_SESSION["q1"]=$qry;
        $_SESSION["q2"]=$qr;
$result=mysqli_query($conn,$qry);

   $_SESSION["unm"]=$username;
        $_SESSION["pwd"]=$password;

   echo("<script>location.href = 'index.php'</script>");          
    
             
 ?>