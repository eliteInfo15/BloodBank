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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
	<title>Welcome to blood bank</title>
  <script type="text/javascript">
    function send_mail() {
     var name=document.getElementById('full_name').value;
     var email=document.getElementById('mail_id').value;
     var phone=document.getElementById('phone_no').value;
     var city_select=document.getElementById('city');
     var city=city_select.options[city_select.selectedIndex].value;
     var msg=document.getElementById('msg').value;
     var msg_body="mail sent by "+name+" email "+email+" phone no. "+phone+" lives in "+city+" saying : "+msg;
  my=window.open('mailto:test@example.com?subject=subject&body='+msg_body);
  

    }
  </script>
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
        <li><a href="Request.php">Request blood</a></li>
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
             
     
    
<div class="container-fluid" style="padding: 0px">
	  <form class="well form-horizontal" onsubmit="send_mail()" method="post"  id="contact_form" >
<fieldset>

<!-- Form Name -->


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Full Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text" id="full_name">
    </div>
  </div>
</div>

<!-- Text input-->



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" id="mail_id">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone </label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" id="phone_no">
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
    <select name="city" class="form-control selectpicker" id="city">
      <option value=" " >Please select your city</option>
      <option value="01">Delhi</option>
      <option>Mumbai</option>
      <option >Indore</option>
      <option >Kanpur</option>
      <option >Ujjain</option>
     
    </select>
  </div>
</div>
</div>

<!-- Text input-->



<!-- Text input-->


<!-- radio checks -->
 

<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Message</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control" name="comment" placeholder="Write your message here" cols="7" rows="3" id="msg"></textarea>
  </div>
  </div>
</div>

<!-- Success message -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" name="send" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
            username: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your username'
                    }
                }
            },
            Password: {
                validators: {
                        stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Please supply your password'
                    }
                    

                }
            },
            confirm_Password: {
                validators: {
                        stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Please supply your password'
                    },
                    identical: {
                    field: 'Password',
                    message: 'The password and its confirm are not the same'
                }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            
            city: {
                validators: {
                    notEmpty: {
                        message: 'Please select your city'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select your gender'
                    }
                }
            },
            blood_group: {
                validators: {
                    notEmpty: {
                        message: 'Please select your blood group'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please write a message'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();
                 $('#form').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    e.preventDefault();
  } else {
    $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
                    // ... Process the result ...
                }
            });
  }
})
            // Prevent form submission
            //e.preventDefault();

            // Get the form instance
            //var $form = $(e.target);

            // Get the BootstrapValidator instance
            //var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'),$form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});

</script>
</body>
</html>