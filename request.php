<?php 

$pname=$_POST["p_name"];


$mail=$_POST["email"];
$phone=$_POST["phone"];
$city=$_POST['city'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['blood_group'];
$conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
$qry="insert into patient values('".$pname."','".$bloodgroup."','".$city."','".$gender."','".$phone."','".$mail."',date(now()))";
//$qr="insert into login_info values('".$username."','".$password."')";
$result=mysqli_query($conn,$qry);

 echo("<script>alert('your request will be posted to donors')</script>"); 
echo("<script>location.href = 'index.php'</script>");          
    
             
 ?>