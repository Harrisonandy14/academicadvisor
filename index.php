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
      <h1 style="background:transparent"><b>Login first before use this system</b></h1>
</section>
<section class="home-banner-area">
<div class="container">
	
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px; border: solid;background: white;color: black">
			<form method="POST" action="login.php" style=" width: 70%; background: white; color:black; border:white; width: auto">
				<p class="text-center" style="font-size:25px;"><b>Login</b></p>
				<hr>
				<div class="form-group">
					<label for="email" style="color:black">Matric Number:</label>
					<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
						type = "number" maxlength = "5" name="matric" id="matric"  maxlength="5" class="form-control">
				</div>
				<div class="form-group">
					<label for="password" style="color:black">Password:</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<button type="submit" name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> <br><a><Don't have account></a><br><a href="new_account.php">Register a new account</a>
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

				

				if(isset($_SESSION['success']) || isset($_SESSION['matric'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
					unset($_SESSION['success']);
					header('location: form 1.php');
				}
			?>
		</div>
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px; border: solid;background: white;color: black">
		<p class="blink blink-two" style="text-transform: uppercase; text-align:center; color:red "><b>Please login with your matric number and your password</b></h4>
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
                            <img src="img/Plaet_Arcadia.jpg" alt="" class="d-inline-block" width="110"></a>
                        </p>
                  
                        <h3 class="nav-item">
                                <a class="nav-link" href="homepage.php">Home Page</a>
                        </h3>
                    </div>
                </div>
            </div>
        </footer>
</html>