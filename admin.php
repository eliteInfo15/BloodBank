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
  .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
	</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Admin Login</h1>
            <div class="account-wall">
                <img class="profile-img" src="images/admin.png"
                    alt="">
                <form class="form-signin" method="post">
                <input type="text" class="form-control" placeholder="username" required autofocus name="unm">
                <input type="password" class="form-control" placeholder="Password" required name="pwd">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
                    Sign in</button>
                
                <span class="clearfix"></span>
                </form>
            </div>
            
        </div>
    </div>
</div>
<?php 
           if (isset($_POST["login"])) {
            
             $username=$_POST["unm"];
             $Password=$_POST["pwd"];
             $conn=mysqli_connect("localhost","root","mysqladmin","blood_bank");
             $qry="select * from admin where username='".$username."' and password='".$Password."' ;";
      $result=mysqli_query($conn,$qry);
      $n=mysqli_num_rows($result);
      $data=mysqli_fetch_assoc($result);
      
      $_SESSION["fnm"]=$fname;
      if ($n>0) {
           
        $_SESSION["unm"]=$username;
        $_SESSION["pwd"]=$Password;

        echo("<script>location.href = 'admin_home.php'</script>");
           } else
 {
   echo ("<script language='javascript'>
          alert('Invalid');
           
          window.location.href='admin.php'
          </script>");
 }

           
           }

           ?>
     
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>