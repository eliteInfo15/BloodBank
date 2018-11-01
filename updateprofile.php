
<?php
session_start(); 
      if (isset($_POST["Update"])) {
      $first_name= $_POST["first_name"];
      $last_name=$_POST["last_name"];
      $unm=$_POST["username"];
      
      $gender=$_POST["gender"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $city=$_POST["city"];
      $blood_group=$_POST["blood_group"];
      $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
      $qry="update donor set first_name='".$first_name."',last_name='".$last_name."',blood_group='".$blood_group."',city='".$city."',email='".$email."',phone='".$phone."',gender='".$gender."' where username='".$_SESSION["unm"]."'";
      $result=mysqli_query($conn,$qry);
     
     echo("<script>location.href = 'viewprofile.php'</script>");
      }
 ?>