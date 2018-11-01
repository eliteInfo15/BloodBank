<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<title>Welcome to blood bank</title>
	<style type="text/css">
  .footer-distributed{
  background-color: #222;
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
    .req{
          border-bottom: 1px solid rgba(138,105,109,0.16);
    padding: 9px 0;
    color: gray;
    }
    .part1{
          width: 80%;
    display: inline-block;
    }
    .part2{
          float: right;
    }
    .sub-part1-1{
      padding: 5px;
      font-size: 12px;
    }
    .sub-part1-2{
          margin: 0;
    padding: 5px;
    font-size: 12px;
    }
    .sub-part2{
      max-width: 50px;
    min-width: 50px;
    width: 50px;
    text-align: center;
    height: 20px;
    color: red;
    font-weight: 700;
    font-size: 20px;
    display: inline-block;
    float: right;
    }
    .sub-part2-2{
          float: right;
    margin-right: 6px;
    }
    .grp4{
      float: right;
    margin-right: 6px;
    }
    .srch{
      color: #666;
    font-size: 10px;
    cursor: pointer;
    width: 38px;
    background-color: #c2c2c2;
    padding: 0;
    text-transform: uppercase;
    font-size: 11px;
    display: inline-block;
    text-align: center;
    border-radius: 0;
    cursor: pointer;
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
        <li><a href="requestblood.php">Request blood</a></li>
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
                        <script type="text/javascript">console.log('hiiiiii');</script>
                       <?php
                     } else 
                     {
                      
                       ?>
                       <script type="text/javascript">console.log('hello');</script>
                      <form class="navbar-form navbar-left" role="search" method="post">
  <div class="form-group">
    <input type="text" class="form-control input-sm" placeholder="Username" name="username">
    <input type="Password" class="form-control input-sm" placeholder="Password" name="Password">
  </div>
  <button type="submit" class="btn btn-success" name="login" data-toggle="modal" data-target="#myModal">Donor login</button>
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
<!--login php code -->
    <?php 
           if (isset($_POST["login"])) {
            
             $username=$_POST["username"];
             $Password=$_POST["Password"];
             $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from donor where username='".$username."' and password='".$Password."' ;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      $data=mysqli_fetch_assoc($result);
      $fname=$data["first_name"];
      
      if ($n>0) {
           
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
          if (isset($_SESSION["unm"])&&isset($_SESSION["pwd"])) {
            ?>
            <?php 

               $username=$_SESSION["unm"];
             $Password=$_SESSION["pwd"];
             $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from donor where username='".$username."' and password='".$Password."' ;";
      $result=mysqli_query($conn,$qry);
                    $data=mysqli_fetch_assoc($result);
      $fname=$data["first_name"];
       $_SESSION["fnm"]=$fname;
             ?>
           <div class="container-fluid" style="padding: 0">
                <div class="jumbotron" style="margin-bottom: 0px">
                     <div class="row">
                         <div class="col-md-6">
                             <h2>Welcome <?php echo $_SESSION["fnm"]?> to Online Blood Bank</h2>
                             <p style="font-size: 15px;">
                               In order to maintain accurate information and facilitate easy access, we recommend  that you update your profile with any recent changes such as a change in the contact number, email id or may be with the date of your most recent blood donation.<br><br>

You may also help us spread the word by referring us to your friends.<br><br>

If you have any feedback, comments or suggestion, please feel free to share them through our contact us section.<br><br>

As always, it is a great pleasure to have you here.<br><br>
                             </p>
                         </div>
                         <div  class="col-md-6">
                          <div class="alert alert-danger text-center">
  <strong>Blood requests</strong>
</div>
<div class="container-fluid" style="margin-top: 0px;">
<?php 
   $i=1;
      $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from patient;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
   while ($i <= 3) {
   
      $data=mysqli_fetch_assoc($result);
      $pname=$data["pname"];
      $city=$data["city"];
      $hospital=$data["gender"];
      $phone=$data["phone"];
      $bgroup=$data["blood_group"];
      $date_rq=$data["date"];
      $date1=date_create($date_rq);
$date= date_format($date1,"M d, Y");
     ?>
<div class="inner" style="padding: 10px 20px">
        <div class="req">
             <div class="part1">
                 <div class="sub-part1-1">
                    <i class="fa fa-user"></i>&nbsp;
                    <b><?php echo $pname ?></b>&nbsp;
                    <i class="fa fa-map-marker"></i>&nbsp;
                    <?php echo $city ?>
                 </div>
                 <div class="sub-part1-1">
                    <i class="fa fa-hospital-o"></i>&nbsp;
                    
                    <b><?php echo $hospital; ?></b>
                 </div>
                 <div class="sub-part1-2">
                   <i class="fa fa-phone"></i>&nbsp;
                   <?php echo $phone ?>&nbsp;
                   <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;
                   Requested on: <?php echo $date ?>&nbsp;
                    
                 </div>

             </div>
             <div class="part2">
                 <div class="sub-part2">
                   <?php echo $bgroup; ?>
                 </div>
                    
               
             </div>
        </div>
    </div>
     <?php
     $i++;
   }


 ?>

</div>
<div class="container-fluid">
    <h5 class="text-center"><a href="" data-toggle="modal" data-target="#largeModal" style="text-decoration: none;">See all</a></h5>
</div>
                         </div>
                     </div>
                </div>
           </div>
           <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Blood requests</h4>
      </div>
      <div class="modal-body">
        <?php 
            $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from patient;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);

while ($data=mysqli_fetch_assoc($result)) {
  $pname=$data["pname"];
      $city=$data["city"];
      $hospital=$data["gender"];
      $phone=$data["phone"];
      $bgroup=$data["blood_group"];
      $email=$data["email"];
      $date_rq=$data["date"];
      $date1=date_create($date_rq);
$date= date_format($date1,"M d, Y");
 ?>
     <div class="col-md-4">
          <div class="inner" style="padding: 10px 20px">
        <div class="req">
             <div class="part1" style="width: 69%">
                 <div class="sub-part1-1">
                    <i class="fa fa-user"></i>&nbsp;
                    <b><?php echo $pname ?></b>&nbsp;
                    <i class="fa fa-map-marker"></i>&nbsp;
                    <?php echo $city ?>
                 </div>
                 <div class="sub-part1-1">
                    <i class="glyphicon glyphicon-envelope"></i>&nbsp;
                    <b><?php echo $email ?></b>&nbsp;
                    
                 </div>
                 <div class="sub-part1-1">
                    <i class="fa fa-hospital-o"></i>&nbsp;
                    
                    <b><?php echo $hospital; ?></b>
                 </div>
                 <div class="sub-part1-2">
                   <i class="fa fa-phone"></i>&nbsp;
                   <?php echo $phone ?>&nbsp;
                   <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;
                   on:  <?php echo $date ?>&nbsp;
                    
                 </div>
                 
             </div>
             <div class="part2">
                 <div class="sub-part2">
                   <?php echo $bgroup; ?>
                 </div>
                    
               
             </div>
        </div>
    </div>
     </div>
 <?php
}
         ?>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>
            <?php
          }

      ?>
<!--login php code -->

<!--slider -->
<div class="container-fluid" style="padding: 0px;">
	<div class="jumbotron"  style="margin-bottom: 0px">
		<div class="row">
			<h2 class="text-center">Search Blood Donors</h2>
		</div>
		<div class="row text-center" style="margin-top: 0px;">
			<form class="form-inline" method="post">

  <div class="form-group">
    
    <select class="select-option" name="bggroup" required>
         <option value="">select group</option>
         <option value="A+">A+</option>
         <option value="B+">B+</option>
         <option value="O+">O+</option>
         <option value="A-">A-</option>
         <option value="B-">B-</option>
         <option value="AB+">AB+</option>
    </select>
  </div>
  <div class="form-group">
    
    <select class="select-option" name="city" required>
         <option value="">select city</option>
         <option value="delhi">Delhi</option>
         <option value="mumbai">Mumbai</option>
         <option value="indore">Indore</option>
         <option value="Kanpur">Kanpur</option>
         <option value="Ujjain">Ujjain</option>
    </select>
    
  </div>
  
  <button type="submit" class="btn btn-success" style="padding: 20px 40px;border-radius:30px" name="search">Search</button>
  <div class="form-group">
       
  </div>
   
</form>	
		</div>
    <?php 

       if (isset($_POST["search"])) {
       	         $status=0;
             if (empty($_POST["city"])) {
             	$status=1;
             	?>
                <div class="alert alert-danger" role="alert" style="text-align: center;margin-top: 30px"><strong>Please select city</strong></div>
             	<?php
             }
             else{
             $city=$_POST["city"];	
             }
             if (empty($_POST["bggroup"])) {
             	$status=1;
             	?>
                <div class="alert alert-danger" role="alert" style="text-align: center;margin-top: 30px"><strong>Please blood group</strong></div>
             	<?php
             }
             else{
             	$group=$_POST["bggroup"];
             }

              
             if ($status==0) {
              	
      $_SESSION["city1"]=$city;
      $_SESSION["group1"]=$group;
     
      echo("<script>location.href = 'searchresult.php'</script>");
              } 
              
     
            
           
             
    
             
            
          }   

      ?>
	</div>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/banner1.jpg" alt="">
      
    </div>
    <div class="item">
      <img src="images/banner2.png" alt="...">
      
    </div>
    <div class="item">
      <img src="images/banner3.png" alt="...">
      
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--slider -->


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
<script type="text/javascript">
  $('#myModal').modal('hide');
</script>
</body>
</html>