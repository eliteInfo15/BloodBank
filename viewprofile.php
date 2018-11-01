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
        <li><a href="Contact.php">Contact us</a></li>
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
                     header('Location:index.php');
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
             
     <?php 
$username=$_SESSION["unm"];
             $Password=$_SESSION["pwd"];
             $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from donor where username='".$username."' and password='".$Password."' ;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      $data=mysqli_fetch_assoc($result);
      $fname=$data["first_name"];
      $lname=$data["last_name"];
      $bgroup=$data["blood_group"];
      $city=$data["city"];
      $uname=$data["username"];
      $email=$data["email"];
      $phone=$data["phone"];
      $gender=$data["gender"];
      $_SESSION["fnm"]=$fname;
      $_SESSION["Last"]=$lname;
      $_SESSION["bgroup"]=$bgroup;
      $_SESSION["city"]=$city;
      $_SESSION["uname"]=$uname;
      $_SESSION["email"]=$email;
      $_SESSION["phone"]=$phone;
      $_SESSION["gender"]=$gender;
      ?>
    
<div class="container-fluid" style="padding: 0px; margin-top: 25px; margin-bottom: 25px; ">
	    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" style="box-shadow: 10px 10px 15px #888888;">
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php  echo $_SESSION["fnm"]." ".$_SESSION["Last"];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://cdn0.iconfinder.com/data/icons/PRACTIKA/256/user.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Blood Group:</td>
                        <td><?php 
                            echo $_SESSION["bgroup"];
                         ?></td>
                      </tr>
                      <tr>
                        <td>City</td>
                        <td><?php echo $_SESSION["city"] ?></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td><?php echo $_SESSION["uname"]; ?></td>
                      </tr>
                   <tr>
                        <td>Gender</td>
                        <td><?php echo $_SESSION["gender"]; ?></td>
                      </tr>
                         <tr>
                             
                        <td>Email</td>
                        <td><?php echo $_SESSION["email"]; ?></td>
                      </tr>
                        <tr>
                        <td>Phone</td>
                        <td><?php echo $_SESSION["phone"]; ?></td>
                      </tr>
                      
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Edit Profile</a>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Remove account</a>
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Give confirmation</h4>
      </div>
      <div class="modal-body">
        <h3>Are you sure?</h3>
        <button type="button" style="display: inline;" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <form method="post" style="display: inline;">
        <button type="submit" class="btn btn-primary" name="remove">Remove</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php 
if (isset($_POST["remove"])) {
     $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
     $qry="delete from donor where username='".$_SESSION["unm"]."'";
     mysqli_query($conn,$qry);
     unset($_SESSION["unm"]);
     unset($_SESSION["pwd"]);
     session_destroy();
     echo("<script>location.href ='index.php'</script>");
}
 ?>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update profile</h4>
      </div>
      <div class="modal-body">
       <form class="well form-horizontal" action="updateprofile.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="<?php echo $_SESSION["fnm"] ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="<?php echo $_SESSION["Last"] ?>">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="username" class="form-control"  type="text" value="<?php echo $_SESSION["uname"] ?>">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Select gender</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select name="gender" class="form-control selectpicker" >
      <option value=" " >Please select your gender</option>
      <option value="male" <?php 
             if (strcmp($_SESSION["gender"],"male")==0) {
               echo "selected";
             }
       ?>>Male</option>
      <option value="female" <?php 
             if (strcmp($_SESSION["gender"],"female")==0) {
               echo "selected";
             }?>>Female</option>
      </select>
    </div>
  </div>
</div>
<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="<?php echo $_SESSION["email"] ?>">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone </label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<?php echo $_SESSION["phone"] ?>">
    </div>
  </div>
</div>

<!-- Text input-->
      


<!-- Text input-->
 


<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">City</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="city" class="form-control selectpicker" >
      <option value=" " >Please select your city</option>
      <option value="delhi" <?php 
             if (strcmp($_SESSION["city"],"delhi")==0) {
               echo "selected";
             }
       ?>>Delhi</option>
      <option value="mumbai" <?php 
             if (strcmp($_SESSION["city"],"mumbai")==0) {
               echo "selected";
             }
       ?>>Mumbai</option>
      <option value="indore" <?php 
             if (strcmp($_SESSION["city"],"indore")==0) {
               echo "selected";
             }
       ?>>Indore</option>
      <option value="kanpur" <?php 
             if (strcmp($_SESSION["city"],"kanpur")==0) {
               echo "selected";
             }
       ?>>Kanpur</option>
      <option value="ujjain" <?php 
             if (strcmp($_SESSION["city"],"ujjain")==0) {
               echo "selected";
             }
       ?>>Ujjain</option>
      
    </select>
  </div>
</div>
</div>
<div class="form-group"> 
  <label class="col-md-4 control-label">Blood group</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="blood_group" class="form-control selectpicker" >
      <option value=" " >Please select your blood group</option>
      <option value="A+" <?php 
             if (strcmp($_SESSION["bgroup"],"A+")==0) {
               echo "selected";
             }
       ?>>A+</option>
      <option value="B+" <?php 
             if (strcmp($_SESSION["bgroup"],"B+")==0) {
               echo "selected";
             }
       ?>>B+</option>
      <option value="O+" <?php 
             if (strcmp($_SESSION["bgroup"],"O+")==0) {
               echo "selected";
             }
       ?>>O+</option>
      <option value="A-" <?php 
             if (strcmp($_SESSION["bgroup"],"A-")==0) {
               echo "selected";
             }
       ?>>A-</option>
      <option value="B-" <?php 
             if (strcmp($_SESSION["bgroup"],"B-")==0) {
               echo "selected";
             }
       ?>>B-</option>
      <option value="O-" <?php 
             if (strcmp($_SESSION["bgroup"],"O-")==0) {
               echo "selected";
             }
       ?>>O-</option>
      <option value="AB-" <?php 
             if (strcmp($_SESSION["bgroup"],"AB-")==0) {
               echo "selected";
             }
       ?>>AB-</option>
      <option value="AB+" <?php 
             if (strcmp($_SESSION["bgroup"],"AB+")==0) {
               echo "selected";
             }
       ?>>AB+</option>
      <option value="A" <?php 
             if (strcmp($_SESSION["bgroup"],"A")==0) {
               echo "selected";
             }
       ?>>A</option>
      
     
    </select>
  </div>
</div>
</div>

<!-- Text input-->



<!-- Text input-->


<!-- radio checks -->
 

<!-- Text area -->
  


<!-- Success message -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" name="Update">Update Profile <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
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
</body>
</html>