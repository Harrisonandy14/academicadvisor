<!DOCTYPE html>
<?php
	session_start();
	if (!isset($_SESSION['matric']) )
	{
		header('Location: index.php');
		exit;
	}
	
	$matric_no = $_SESSION['matric'];
	
	$conn = mysqli_connect('localhost','root','','advising');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">


<title>Your Profile</title>


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
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Arial;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  border-radius: 5px;
    border-right: 3px solid #ccc6c6;
    border-bottom: 1px solid #cfc9c9;
}

h1 {
  text-align: center;  
}

input[type=text] {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Arial;
  border: 1px solid #aaaaaa;
}

input[type=checkbox]{
  padding: 10px;
  width: auto;
  float: right;
  font-size: 17px;
  font-family: Arial;
  border: 1px solid #aaaaaa;
}
input:checked+label {
    background: #bebaf2;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Arial;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
label {
  width:200px;
  height:35px;
  color:black;
  
}
.formpattern{
  border: 1px solid grey;
  border-radius: 4px;
  padding: 1px;
  background-color: #f4f9f9;
}
.col-sm-3:hover {
  background-color:#bebaf2;
  cursor: pointer;
  border-radius: 3px;
}
label:hover {
  background-color:#bebaf2;
  cursor: pointer;
  border-radius: 3px;
}
.active{
  background-color:#d3ffc9;
  color: black;
}
.content {
  font-family:Arial;
  font-size: 20px;
}
  
.modal-body{
  text-align:center;
}
.btn-secondary{
  width: auto;
}
.btn-group{
  display: grid;
  vertical-align: middle;
}
.blink {
        animation: blinker 0.6s linear infinite;
        color: #red;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      }
</style>

<body>

<?php
	$sql_c = "SELECT * FROM suggested_course WHERE MATRIC_NO = '$matric_no'";
	$result_c = mysqli_query($conn, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);
	$rowcount=mysqli_num_rows($result_c);
	if ( $rowcount > 0 )
		?>
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
<section class=home-banner-area>
    <div class="container">
      <div class="row">
        <h1>Academic Advising System</h1><br>
      </div>
		<div class="row">
      <div class="this_card">
        
       <div class="card_body">
         <h3 class="card_title">You already take the test before. <br>Are you want to view the result click <br> <i><b>View your result</b></i> or <br> <i><b>Retake the test</b></i> to retake the test.</h3>
         <div class="add_pad">
            <a class="btn btn-primary this_btn" href="output.php">View result</a>
            <a class="btn btn-primary this_btn" href="delete.php">Retest</a>
            <a class="btn btn-primary this_btn" href="endsession.php">Log Out</a>
         </div>
          
        </div>
      </div>
    </div>
    
      </div>
	


</body>
<br>
<footer class="footer-area">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">
                            <img src="img/Plaet_Arcadia.jpg" alt="" class="d-inline-block" width="110"></a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
</html>