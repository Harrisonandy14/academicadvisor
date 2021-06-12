<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">


			<title>COSAP 2.0</title>
	

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Academic Advising System">

	<link name="favicon" type="image/x-icon" href="img/Plaet_Arcadia.jpg" rel="shortcut icon">
	
    <link rel="stylesheet" href="css/jquery.webui-popover.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <!-- font awesome 5 -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/toastr.css">
    <link rel="stylesheet" href="css/jquery.nestable.min.css">
    <script src="css/jquery-3.3.1.min.js"></script>
</head>
</head>
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
  .blink {
        animation: blinker 0.6s linear infinite;
        color: #ff0a0a;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
      }
    
      
      .blink-two {
        animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {
        100% {
          opacity: 0;
        }
      }
</style>
<body>
<section class="menu-area">
  <div class="container-xl">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <a class="navbar-brand"><img src="img/Plaet_Arcadia.jpg" alt="" height="35"></a>
          <h2> <b>Academic Advisor System</h2></p>

        </nav>
      </div>
    </div>
  </div>
</section>
<section>
      <h1 style="background:transparent"><b>Sign Up for new user</b></h1>
</section>
<section class="home-banner-area">
<div class="container">

	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px; border: solid;background: white;color: black">
			<form method="POST" action="register.php" style="width: auto; border: white">
				<p class="text-center" style="font-size:25px;"><b>Sign Up</b></p>
				<hr>
				<div class="form-group">
					<label for="matric" style="color:black">Matric Number:</label>
					<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
						type = "number" maxlength = "5" name="matric" id="matric" class="form-control" value="<?php echo (!empty($_SESSION['email']) ? $_SESSION['email'] : '') ?>">
				</div>
				<div class="form-group">
					<label for="password" style="color:black">Password:</label>
					<input type="password" name="password" id="password" class="form-control" value="<?php echo (!empty($_SESSION['password']) ? $_SESSION['password'] : '') ?>">
				</div>
				<div class="form-group">
					<label for="confirm_password" style="color:black">Confirm Password:</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo (!empty($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : '') ?>">
				</div>
				<button type="submit" name="register" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Register</button> 
				<br>
				<br>
				<a href="index.php">Already a member? Login</a>
			</form>
			<?php
				if(isset($_SESSION['error'])){
				?>
				<div class="alert alert-danger text-center" style="margin-top:20px;">
					<?php echo $_SESSION['error']; ?>
				</div>
				<?php

				unset($_SESSION['error']);
			}

			?>
			
		</div>
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:40px; border: solid;color: black ; background:white">
		<p class="blink blink-two" style="text-transform: uppercase; text-align:center; color:red "><b>Please make sure your password same with confirm password</b></p>
		</div>
	</div>
	
</div>
</section>
</body>
<footer class="footer-area">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">
                            <a href=""><img src="img/Plaet_Arcadia.jpg" alt="" class="d-inline-block" width="110"></a>
                            <a href="http://lms.com/" target="_blank"></a>
                        </p>
                    
                        <h3 class="nav-item">
                                <a class="nav-link" href="homepage.php">Home Page</a>
                        </h3>
                    </div>
                </div>
            </div>
        </footer>
</html>