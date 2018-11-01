<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" type="image/ico" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<title>Welcome to blood bank</title>
	<style type="text/css">
	#poster{
		
	}
  .footer-distributed{
  background-color: #131418;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: normal 7px sans-serif;

  padding: 45px 50px;
  margin-top: 0px;
}

.footer-distributed .footer-left p{
  color:  #8f9296;
  font-size: 14px;
  margin: 0;
}

/* Footer links */

.footer-distributed p.footer-links{
  font-size:14px;
  font-weight: bold;
  color:  #ffffff;
  margin: 0 0 10px;
  padding: 0;
}

.footer-distributed p.footer-links a{
  display:inline-block;
  line-height: 1.8;
  text-decoration: none;
  color:  inherit;
}

.footer-distributed .footer-right{
  float: right;
  margin-top: 6px;
  max-width: 180px;
}

.footer-distributed .footer-right a{
  display: inline-block;
  width: 35px;
  height: 35px;
  background-color:  #33383b;
  border-radius: 2px;

  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;

  margin-left: 3px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 600px) {

  .footer-distributed .footer-left,
  .footer-distributed .footer-right{
    text-align: center;
  }

  .footer-distributed .footer-right{
    float: none;
    margin: 0 auto 20px;
  }

  .footer-distributed .footer-left p.footer-links{
    line-height: 1.8;
  }
}

		.select-option{
			padding: 20px;
    background: firebrick;
    color: white;
    border-radius: 30px;
    font-family: segoe ui light;
		}

    #search-btn{
      text-decoration:none;
      padding: 20px 40px 20px 40px;
      background-color: #388E3C;
      color: white;
      border-radius: 30px;
    font-family: segoe ui light;
    }
 button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
div+p {
    font-size: 15px;
}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse" style="margin-bottom:0;border-radius: 0">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a class="navbar-brand" href="#"><img class="img-responsive" src="images/logo.png" alt="" id="logo"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="About.php">About us</a></li>
        <li><a href="Register.php">Register as donor</a></li>
        <li><a href="Requestblood.php">Request blood</a></li>
        <li><a href="Bloodtips.php">Blood tips</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><?php 
        ob_start(); 

                     if (isset($_SESSION["unm"])&&isset($_SESSION["pwd"])) 
                     {
                       
                       ?>
                       <form class="form-group" style="margin-top: 10px;margin-bottom: 10px;" method="post">
                         
                         <button type="submit" class="btn btn-success" name="logout">Logout</button>
                       </form><?php
                     } else 
                     {
                      
                       ?>
                      <form class="navbar-form navbar-left" role="search" method="post">
  <div class="form-group">
    <input type="text" class="form-control input-sm" placeholder="Username" name="username">
    <input type="Password" class="form-control input-sm" placeholder="Password" name="Password">
  </div>
  <button type="submit" class="btn btn-success" name="login" data-toggle="modal" data-target="#myModal">login</button>
</form>
<?php

                     }
                     if (isset($_POST["logout"])) {
                     unset($_SESSION["unm"]);
                     unset($_SESSION["pwd"]);
                     session_destroy();
                     //echo "<script>alert('hello')</script>";
                     echo("<script>location.href = 'index.php'</script>");
                   }
                   ob_end_flush();
?></li>
                   
<?php 
   if (isset($_SESSION["unm"]) && isset($_SESSION["pwd"])) {
    ?>
  <li>
    <a href="viewprofile.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Profile</a>
  </li>
    <?php
   }

 ?>
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php 
           if (isset($_POST["login"])) {
            $show_modal = false;
             $username=$_POST["username"];
             $Password=$_POST["Password"];
             $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from donor where username='".$username."' and password='".$Password."' ;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      $data=mysqli_fetch_assoc($result);
      $fname=$data["first_name"];
      $_SESSION["fnm"]=$fname;
      if ($n>0) {
          $show_modal = true;  
        $_SESSION["unm"]=$username;
        $_SESSION["pwd"]=$Password;
        echo("<script>location.href = 'index.php'</script>");
           } else
 {
   echo ("<script language='javascript'>
          alert('Invalid');
           
          window.location.href='index.php'
          </script>");
 }

           
           }

           ?>

<div class="container-fluid" style="padding: 0px">
	   <div class="jumbotron" style="margin-bottom: 0px">
	   	
        <h2 class="text-center">Some blood tips</h2>
         <button class="accordion">Beat the myths</button>
<div class="panel">
  <p style="font-size: 15px;">
    Donating blood is safe and simple. It takes approximately 10-15 minutes to complete the blood donation process. Any healthy adult between 18 years and 60 years of age can donate blood. This is what you can expect when you are ready to donate blood:

You walk into a reputed and safe blood donation centre or a mobile camp organized by a reputed institution.
A few questions will be asked to determine your health status (general questions on health, donation history etc). Usually you will be asked to fill out a short form.
Then a quick physical check will be done to check temperature, blood pressure, pulse and hemoglobin content in blood to ensure you are a healthy donor.
If found fit to donate, then you will be asked to lie down on a resting chair or a bed. Your arm will be thoroughly cleaned. Then using sterile equipments blood will be collected in a special plastic bag. Approximately 350 ml of blood will be collected in one donation. Those who weigh more than 60 Kg can donate 450 ml of blood.
Then you must rest and relax for a few minutes with a light snack and something refreshing to drink. Some snacks and juice will be provided.
Blood will be separated into components within eight hours of donation
The blood will then be taken to the laboratory for testing.
Once found safe, it will be kept in special storage and released when required.
The blood is now ready to be taken to the hospital, to save lives.
  </p>
</div>

<button class="accordion">Blood groups</button>
<div class="panel">
  <p style="font-size: 15px;">
    Blood type is determined by which antibodies and antigens the person's blood produces. An individual has two types of blood groups namely ABO-grouping and Rh-grouping. Rh is called as the Rhesus factor that has come to us from Rhesus monkeys.
     <br>
Most humans are in the ABO blood group. The ABO group has four categories namely <br>
1) A group<br> 2) B group<br> 3) O group<br> and 4) AB group<br>
In the Rh- group, either the individual is said to be Rh- Negative or Rh- Positive.
<br>
Thus blood group of any human being will mainly fall in any one of the following groups. <br>
A positive or A negative <br>
B positive or B negative <br>
O positive or O negative<br> 
AB positive or AB negative.
  </p>
</div>

<button class="accordion">Universal donors and recipients</button>
<div class="panel">
  <p style="font-size: 15px;">
The most common blood type is O, followed by type A.
<br><br>
Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.
<br><br>Do donate blood, if you satisfy following conditions
However, since approximately twice as many people in the general population have O and A blood types, a blood bank's need for this type of blood increases exponentially.
  </p>
</div>
  <button class="accordion">Do donate blood, if you satisfy following conditions</button>
<div class="panel">
  <p style="font-size: 15px;">
    <ul>
      <li>You are between age group of 18-60 years.</li>
      <li>Your weight is 45 kgs or more.</li>
      <li>Your hemoglobin is 12.5 gm% minimum.</li>
      <li>Your last blood donation was 3 or more months earlier.</li>
      <li>You are healthy and have not suffered from malaria, typhoid or other transmissible disease in the recent past.</li>
    </ul>
  </p>
</div>        
<button class="accordion">Do not donate blood, if you satisfy following conditions</button>
<div class="panel">
  <p style="font-size: 15px;">
    <ul>
      <li>Cold / fever in the past 1 week..</li>
      <li>Under treatment with antibiotics or any other medication.</li>
      <li>Cardiac problems, hypertension, epilepsy, diabetes (on insulin therapy), history of cancer, chronic kidney or liver disease, bleeding tendencies, venereal disease etc.</li>
      <li>Major surgery in the last 6 months.</li>
      <li>Vaccination in the last 24 hours.</li>
    </ul>
  </p>
</div>
<button class="accordion">A healthy donor</button>
<div class="panel">
  <p style="font-size: 15px;">
    A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.
  <br><br>
  Low fat foods<br><br>
  Iron rich foods

  </p>
</div>
<button class="accordion">Bllod bank</button>
<div class="panel">
  <p style="font-size: 15px;">
      A blood bank is a place designed especially for the storage of blood and blood products. Large coolers hold these products at a constant temperature and they are available at a moment's notice.
  </p>
</div>

</div>
</div>








<footer class="footer-distributed">

      <div class="footer-right">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

      </div>

      <div class="footer-left">

        <p class="footer-links">
          <a href="index.php">Home</a>
          ·
          <a href="about.php">About Us</a>
          ·
          <a href="Register.php">Register As Donor</a>
          ·
          <a href="Requestblood.php">Request Blood</a>
          ·
          <a href="Bloodtips.php">Blood Tips</a>
          ·
          <a href="contact.php">Contact</a>
        </p>

        <p>All rights reserved © 2017</p>
      </div>

    </footer>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<script type="text/javascript">
 var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
</body>
</html>