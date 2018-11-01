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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
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
    .display{
      //margin: 20px;
      padding: 20px;
      
    }
    .details{
      border-width: 1px;
      border-color: #E0E0E0;
    border-style: solid;
    width: 80%;
    padding: 30px;
    font-size: 22px;
    position: relative;
    text-transform: capitalize;
    box-shadow:5px 10px 18px #888888;
    }
    .bgroup{
      position: absolute;
    right: 0;
    top: 0;
    padding: 8px;
    background: #e53935;
    color: white;
    font-family: 15px;
    font-size: 15px;
    }
    .location{
      font-size: 13px; 
      font-weight: 700;   
      color: #757575;
    padding: 17px 0;
    border-bottom: 1px solid rgba(138,105,109,0.14);
    }
    .more_detail{
      //float: left;
    margin:18px auto;
    padding-bottom: 0!important;
    //width: 55.9%;
    }
    .more-btn{
      padding: 10px 0;
    border-top: 1px solid #dcdcdc;
    text-align: center;
    font-size: 15px;
    display: block;
    background-color: #dcdcdc;
    color: #000;
    cursor: pointer;
    transition: all 0.5s ease-in-out;
    }
    .more_detail:hover .more-btn{
      background-color: firebrick;
      color: white;
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
        <li>
        <?php  

                     if (isset($_SESSION["unm"])&&isset($_SESSION["pwd"])) 
                     {
                       
                       ?>
                       <form class="form-group" style="margin-top: 10px;margin-bottom: 10px;" method="post">
                         
                         <button type="submit" class="btn btn-success" name="logout">Logout</button>
                       </form>
                       
                       <?php
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
                     
                     
              ?>
              <?php 

                    if (isset($_POST["logout"])) {
                     unset($_SESSION["unm"]);
                     unset($_SESSION["pwd"]);
                     session_destroy();
                     //echo "<script>alert('hello')</script>";
                    echo("<script>location.href = 'index.php'</script>");
                   }
               ?>
              
</li>
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
             
     
    
<div class="container-fluid" style="">
     <?php 
     $city=$_SESSION["city1"];
      $group=$_SESSION["group1"]; 
      
      $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from donor where blood_group='".$group."' and city='".$city."'";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      
      
       if ($n>0) {
?>
<div class="alert alert-success" role="alert" style="text-align: center;margin-top: 30px"><strong><?php echo $n ?> records showing for <?php echo $city; ?> city, <?php echo $group; ?> blood group</strong></div>
<?php
         while ($data=mysqli_fetch_assoc($result)) {
           ?>
         
               <div class="col-md-6 display">
                 <div class="details">
                 <div class="bgroup">
                   <?php echo $group; ?>
                 </div>
                 <div style="margin-bottom: 15px;">
              <i class="fa fa-user icon1" aria-hidden="true"></i>    <?php echo $data["first_name"]." "; echo $data["last_name"];?>
                  </div>
              <div class="location">
                  <i class="fa fa-map-marker icon1" aria-hidden="true"></i>   <?php echo $city; ?>
                 </div>
              <div class="location">
                  <i class="fa fa-envelope icon1" aria-hidden="true"></i>   <?php echo $data["email"]; ?>
                 </div>   
                 <div class="location">
                  <i class="fa fa-phone-square icon1" aria-hidden="true"></i>   <?php echo $data["phone"]; ?>
                 </div>   
                 </div>
                 
               </div>
               

         
           <?php
         }
       } else {
      ?>
      <div class="container-fluid" style="padding: 0">
        <div class="col-md-6">
          <img src="images/noresult.png" class="img-responsive">
        </div>
        <div class="col-md-6">
        <div style="text-align: center;margin-top: 30%;">
          <h1 style="width: 100%;font-family: 'Passion One';font-size: 5em;color: #424242">NO RESULT FOUND !</h1>
          <p style="font-family: 'Passion One';font-size: 2em">Please modify your search result and try again.</p>
        </div>
           
        </div>
      </div>
      <?php
       }
       
      ?>

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
</body>
</html>