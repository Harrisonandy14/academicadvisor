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

<section class="home-banner-area" style="padding: 10px 10px">
<form id="regForm" action="data.php" method="post">
  
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <div class="row">
    <h1 style="color:black"><b>Previous Result</b></h1><br>
    <h3 style="color:black"><b>Please select your grade based on Year 1 result. If you failed the subject, select D & F.</b></h3>
    <br>
    <?php
      if (isset($_GET['alert'])) {
          echo '
            <div class="alert alert-danger" role="alert">
              You might have some missing fill.   
            </div>

          ';
      }
    ?>
    </div>
    <div class="row">
    <div class="diff_form" style="padding: 10px;border: 1px solid #dc3545;border-radius: 5px;background: #ffffff;color:black">
      <div class="form-group" style="background: #fff;padding: 17px 5px; font-style: bold;">
        <h4 style="background: #fff; padding: 17px 5px;">Basic Programming Grade:</h4>
          <div class="row no_pad" style="text-align: center;">
            <div class="col-sm-3 no_pad">
              <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeBP_A" name="score_programming" value="A">
                <label style="width: 80px; " for="formGroupGradeBP_A">A, A-</label>
            </div>
            <div class="col-sm-3 no_pad">
              <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeBP_B" name="score_programming" value="B">
                <label style="width: 80px; " for="formGroupGradeBP_B">B+, B, B-</label>
            </div>
            <div class="col-sm-3 no_pad">
              <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeBP_C" name="score_programming" value="C">
                <label style="width: 80px; " for="formGroupGradeBP_C">C+, C, C-</label>
            </div>
            <div class="col-sm-3 no_pad">
              <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeBP_D" name="score_programming" value="D">
                <label style="width: 160px; " for="formGroupGradeBP_D">D, F</label>
            </div>    
                                          
          </div>  
        
        </div>
        <hr>

        <div class="form-group">
        <h4>Discrete Structure Grade:</h4>  
        <div class="row no_pad" style="text-align: center;">
            <div class="col-sm-3 no_pad">      
              <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeDS_A" name="score_discrete"   value="A">
                <label style="width: 160px; " for="formGroupGradeDS_A">A, A-</label>
            </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeDS_B" name="score_discrete" value="B">
          <label style="width: 160px; " for="formGroupGradeDS_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeDS_C" name="score_discrete" value="C">
            <label style="width: 160px; " for="formGroupGradeDS_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeDS_D" name="score_discrete" value="D">
            <label style="width: 160px; " for="formGroupGradeDS_D">D, F</label>
          </div>
                      
          </div>
        </div>
        <hr>

        <div class="form-group">
        <h4>Cognition Design Grade:</h4>  
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCD_A" name="score_cognitionDesign" value="A">
            <label style="width: 160px; " for="formGroupGradeCD_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCD_B" name="score_cognitionDesign" value="B">
            <label style="width: 160px; " for="formGroupGradeCD_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCD_C" name="score_cognitionDesign" value="C">
            <label style="width: 160px; " for="formGroupGradeCD_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCD_D" name="score_cognitionDesign" value="D">
            <label style="width: 160px; " for="formGroupGradeCD_D">D, F</label>
          </div>
        </div>      
        </div>
        <hr>

        <div class="form-group">
        <h4>Calculus Grade:</h4>        
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCalculus_A" name="score_calculus" value="A">
            <label style="width: 160px; " for="formGroupGradeCalculus_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
             <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCalculus_B" name="score_calculus" value="B">
            <label style="width: 160px; " for="formGroupGradeCalculus_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCalculus_C" name="score_calculus" value="C">
            <label style="width: 160px; " for="formGroupGradeCalculus_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCalculus_D" name="score_calculus" value="D">
            <label style="width: 160px; " for="formGroupGradeCalculus_D">D, F</label>
          </div>
        </div>                    
        </div>
        <hr>

        <div class="form-group">
        <h4>Artificial Intelligence Grade:</h4> 
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeAI_A" name="score_ai" value="A">
            <label style="width: 160px; " for="formGroupGradeAI_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeAI_B" name="score_ai" value="B">
            <label style="width: 160px; " for="formGroupGradeAI_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeAI_C" name="score_ai" value="C">
            <label style="width: 160px; " for="formGroupGradeAI_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeAI_D" name="score_ai" value="D">
            <label style="width: 160px; " for="formGroupGradeAI_D">D, F</label>
          </div>
        </div>                       
        </div>
        <hr>

        <div class="form-group">
        <h4>Cognitive Neuroscience Grade:</h4>  
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeNS_A" name="score_neuroscience" value="A">
            <label style="width: 160px; " for="formGroupGradeNS_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeNS_B" name="score_neuroscience" value="B">
            <label style="width: 160px; " for="formGroupGradeNS_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeNS_C" name="score_neuroscience" value="C">
            <label style="width: 160px; " for="formGroupGradeNS_C">C+, C, C-</label>
          </div> 
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeNS_D" name="score_neuroscience" value="D">
            <label style="width: 160px; " for="formGroupGradeNS_D">D, F</label>
          </div>

        </div>                            
        </div>
        <hr>

        <div class="form-group">
        <h4>Introduction to Linguistic Grade:</h4>     
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeL_A" name="score_linguistic" value="A">
            <label style="width: 160px; " for="formGroupGradeL_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeL_B" name="score_linguistic" value="B">
            <label style="width: 160px; " for="formGroupGradeL_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeL_C" name="score_linguistic" value="C">
            <label style="width: 160px; " for="formGroupGradeL_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeL_D" name="score_linguistic" value="D">
            <label style="width: 160px; " for="formGroupGradeL_D">D, F</label>
          </div>

        </div>   
        </div>
        <hr>

        <div class="form-group">
        <h4>Human Development Psychology Grade:</h4>  
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input  type="radio" class="custom-control-input radio_grade" id="formGroupGradeHDP_A" name="score_hdp" value="A">
            <label style="width: 160px; " for="formGroupGradeHDP_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeHDP_B" name="score_hdp" value="B">
            <label style="width: 160px; " for="formGroupGradeHDP_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeHDP_C" name="score_hdp" value="C">
            <label style="width: 160px; " for="formGroupGradeHDP_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeHDP_D" name="score_hdp" value="D">
            <label style="width: 160px; " for="formGroupGradeHDP_D">D, F</label>
          </div>

        </div>              
        </div>
        <hr>

        <div class="form-group">
        <h4>Cognitive Psychology Grade:</h4>        
        <div class="row no_pad" style="text-align: center;">
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCP_A" name="score_cogpsychology" value="A">
            <label style="width: 160px; " for="formGroupGradeCP_A">A, A-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCP_B" name="score_cogpsychology" value="B">
            <label style="width: 160px; " for="formGroupGradeCP_B">B+, B, B-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCP_C" name="score_cogpsychology" value="C">
            <label style="width: 160px; " for="formGroupGradeCP_C">C+, C, C-</label>
          </div>
          <div class="col-sm-3 no_pad">
            <input type="radio" class="custom-control-input radio_grade" id="formGroupGradeCP_D" name="score_cogpsychology" value="D">
            <label style="width: 160px; " for="formGroupGradeCP_D">D, F</label>
          </div>

        </div>
                
        </div>
        </div>
        </div>
        <hr>


  </div>
  <div class="tab" style="text-align: justify; " >
    <div class="row">
    <br>
    
        <h1 style="color:black"><b> Holland Code (RIASEC) Test </b></h1>
        <h4 style="color:black">The Holland Occupational Themes is a theory of personality that focuses on career and vocational choice. It groups people on the basis of their suitability for six different categories of occupations. The six types yield the RIASEC acronym, by which the theory is also commonly known. The theory was developed by John L. Holland over the course of his career, starting in the 1950s. The typology has come to dominate the field of career counseling and has been incorporated into most of the popular assessments used in the field. The RIASEC Markers from the Interest Item Pool were developed by Liao, Armstrong and Rounds (2008) for use in psychological research as a public domain alternative to the usual assessments which are marketed commercially.</h4><br>
        <img src = "img/RAISEC.png" alt="centered image"><br>
        <br>
        <br>
        <div style="color:black">
        <h3><i>R = Realistic</i></h3>
        <h4>These people are often good at mechanical or athletic jobs.<h3>
        <br>
        <h3><i>I = Investigative</i></h3>
        <h4>These people like to watch, learn, analyze and solve problems.</h4>
        <br>
        <h3><i>A = Artistic</i></h3>
        <h4>These people like to work in unstructured situations where they can use their creativity.</h4>
        <br>
        <h3><i>S = Social</i></h3>
        <h4>These people like to work with other people, rather than things.</h4>
        <br>
        <h3><i>E = Enterprising</i></h3>
        <h4>These people like to work with others and enjoy persuading and and performing.</h4>
        <br>
        <h3><i>C = Conventional</i></h3>
        <h4>These people are very detail oriented,organized and like to work with data.</h4>
        <br>
        <br>
        </div>
    </div>
    <br>
    <br>
  
    <br>
    </div>
    
  <div class="tab" style="color:black"><br>
   <h2><b>RIASEC</b></h2>
   <h3><b>Please read each of the statement and select which one you are.</b></h3>
  <div class="form-group form-check" style="color: black;">
      <div style="background-color: white; font-size: 20px; padding: 20px; ">

      <h4><b>REALISTIC</b></h4>
      <div class="cover">
      <label for="riasec_ans1" style="width:100%;">I like to repairing electricity <input type="checkbox" id="riasec_ans1" name="riasec_ans[]" value="R"></label>
        <br>
     
        <label for="riasec_ans7" style="width:100%;">I like cook<input type="checkbox" id="riasec_ans7" name="riasec_ans[]" value="1"></label>
        <br>
        <label for="riasec_ans14" style="width:100%;">I like to work outside<input type="checkbox" id="riasec_ans14" name="riasec_ans[]" value="R"></label>
        <br>
        
        <label for="riasec_ans22" style="width:100%;">I like to repairing electricity<input type="checkbox" id="riasec_ans22" name="riasec_ans[]" value="R"></label>
        <br>
        
        <label for="riasec_ans30" style="width:100%;">I like to take care of animals<input type="checkbox" id="riasec_ans30" name="riasec_ans[]" value="R"></label>
        <br>
       
        <label  for="riasec_ans32" style="width:100%;">I always use spreadsheets to organize financial data<input type="checkbox"  id="riasec_ans32" name="riasec_ans[]" value="R"></label>
        <br>
      
        <label for="riasec_ans37" style="width:100%;">I like working outdoors <input type="checkbox"  id="riasec_ans37" name="riasec_ans[]" value="R"></label>
        </div>
        </div>
        <br>

        <div style="background-color:white;font-size: 20px; padding: 20px;">
        <h4><b>INVESTIGATE</b></h4>
        <div class="cover">
        <label for="riasec_ans2" style="width:100%;">I like to solve math and science problems<input type="checkbox" id="riasec_ans2" name="riasec_ans[]" value="I"></label>
        <br>
        
        <label for="riasec_ans11" style="width:100%;">I'm better in solving a puzzle<input type="checkbox"  id="riasec_ans11" name="riasec_ans[]" value="I"></label>
        <br>
        
        <label  for="riasec_ans18" style="width:100%;">I like to do compute and record statistical<input type="checkbox" id="riasec_ans18" name="riasec_ans[]" value="I"></label>
        <br>
        
        <label  for="riasec_ans21" style="width:100%;">I like to work in biology lab<input type="checkbox"  id="riasec_ans21" name="riasec_ans[]" value="I"></label>
        <br>
        
        <label  for="riasec_ans26" style="width:100%;">I can resemble any broken electrical parts<input type="checkbox"  id="riasec_ans26" name="riasec_ans[]" value="I"></label>
        <br>
       
        <label for="riasec_ans33" style="width:100%;">I like to study the animal behaviour <input type="checkbox" id="riasec_ans33" name="riasec_ans[]" value="I"></label>
        <br>
        <label for="riasec_ans39" style="width:100%;">I’m good at calculation<input type="checkbox" id="riasec_ans39" name="riasec_ans[]" value="I"></label>
        </div>
        </div>
        <br>

        <div style="background-color: white ;font-size: 20px;padding: 20px;">
        <h4><b>ARTISTIC</b></h4>
        <div class="cover">        
        <label for="riasec_ans3" style="width:100%;">I like to write song lyric<input type="checkbox" id="riasec_ans3" name="riasec_ans[]" value="A"></label>
        <br>
        
        <label for="riasec_ans8" style="width:100%;">I can design a greeting card<input type="checkbox"  id="riasec_ans8" name="riasec_ans[]" value="A"></label>
        <br>

        <label for="riasec_ans17" style="width:100%;">I like to design the book scrapp<input type="checkbox" id="riasec_ans17" name="riasec_ans[]" value="A"></label>
        <br>
        
        <label  for="riasec_ans23" style="width:100%;">I like to repair any broken electical items<input type="checkbox" id="riasec_ans23" name="riasec_ans[]" value="A"></label>
        <br>
        
        <label  for="riasec_ans31" style="width:100%;">I like to study animal behaviour<input type="checkbox"  id="riasec_ans31" name="riasec_ans[]" value="A"></label>
        <br>
        
        <label  for="riasec_ans41" style="width:100%;">I like to paint in a potret<input type="checkbox"  id="riasec_ans41" name="riasec_ans[]" value="A"></label>
        <br>
        </div>
        </div>
        <br>

        <div style="background-color: white;font-size: 20px;padding: 20px;">
        <h4><b>SOCIAL</b></h4>
        <div class="cover">
        
        <label for="riasec_ans4" style="width:100%;">I like teach ohers<input type="checkbox" id="riasec_ans4" name="riasec_ans[]" value="S"></label>
        <br>
        
        <label for="riasec_ans12" style="width:100%;">I like to helps others<input type="checkbox" id="riasec_ans12" name="riasec_ans[]" value="S"></label>
        <br>
        
        <label for="riasec_ans13" style="width:100%;">I prefer to work in a group<input type="checkbox" id="riasec_ans13" name="riasec_ans[]" value="S"></label>
        <br>
        
        <label for="riasec_ans20" style="width:100%;">I like to learn about others<input type="checkbox" id="riasec_ans20" name="riasec_ans20" value="S"></label>
        <br>
        
        <label for="riasec_ans28" style="width:100%;">I like to get a group discussion<input type="checkbox" id="riasec_ans28" name="riasec_ans[]" value="S"></label>
        <br>
        
        <label for="riasec_ans34" style="width:100%;">I like to do volunterr work<input type="checkbox" id="riasec_ans34" name="riasec_ans[]" value="S"></label>
        <br>
       
        <label for="riasec_ans40" style="width:100%;">I like do something that non-profit <input type="checkbox" id="riasec_ans40" name="riasec_ans[]" value="S"></label>
        </div>
        </div>
        <br>

        <div style="background-color: white ;font-size: 20px;padding: 20px;">
      <h4><b>ENTERPRISING</b></h4>
        <div class="cover">
        
        <label for="riasec_ans5" style="width:100%;">I like to manage a food store<input type="checkbox" id="riasec_ans5" name="riasec_ans[]" value="E"></label>
        <br>
        
        <label  for="riasec_ans10" style="width:100%;">I like to try to influence or persuade people<input type="checkbox" id="riasec_ans10" name="riasec_ans[]" value="E"></label>
        <br>
        
        <label  for="riasec_ans16" style="width:100%;">I like selling things<input type="checkbox" id="riasec_ans16" value="E" name="riasec_ans[]"></label>
        <br>
        
        <label  for="riasec_ans19" style="width:100%;">I am quick to take on new responsibilities<input type="checkbox"  id="riasec_ans19" name="riasec_ans[]" value="E"></label>
        <br>
        
        <label for="riasec_ans29" style="width:100%;">I would like to start my own business<input type="checkbox"  id="riasec_ans29" name="riasec_ans[]" value="E"></label>
        <br>
        
        <label for="riasec_ans36" style="width:100%;">I like to lead<input type="checkbox"  id="riasec_ans36" name="riasec_ans[]" value="E"></label>
        <br>
        
        <label for="riasec_ans42" style="width:100%;">I like to give speeches<input type="checkbox" id="riasec_ans42" name="riasec_ans[]" value="E"></label>
        </div>
        </div>
        <br>

        <div style="background-color: white;font-size: 20px;padding: 20px;">
      <h4><b>CONVENTIONAL</b></h4>
        <div class="cover">
        
        <label for="riasec_ans5" style="width:100%;">I like to organize things,(files, desks/offices) <input type="checkbox"  id="riasec_ans6" name="riasec_ans[]" value="C"></label>
        <br>
        
        <label for="riasec_ans9" style="width:100%;">I like to have clear instructions to follow <input type="checkbox" id="riasec_ans9" name="riasec_ans[]" value="C"></label>
        <br>
        
        <label for="riasec_ans15" style="width:100%;">I wouldn’t mind working 8 hours per day in an office<input type="checkbox" id="riasec_ans15" name="riasec_ans[]" value="C"></label>
        <br>
       
        <label for="riasec_ans24" style="width:100%;">I pay attention to details <input type="checkbox" id="riasec_ans24" name="riasec_ans[]" value="C"></label>
        <br>
        
        <label for="riasec_ans25" style="width:100%;">I like to do filing or typing<input type="checkbox"  id="riasec_ans25" name="riasec_ans[]" value="C"></label>
        <br>
        
        <label for="riasec_ans35" style="width:100%;">I am good at keeping records of my work<input type="checkbox" id="riasec_ans35" name="riasec_ans[]" value="C"></label>
        <br>
        
        <label  for="riasec_ans38" style="width:100%;">I would like to work in an office<input type="checkbox" id="riasec_ans38" name="riasec_ans[]" value="C"></label>
        </div>
      </div>  

  </div>
</div>
<div class="tab">
<div class="container" style="text-align:justify; color:black">
    <br>
        <h1><b> DISC Test </b></h1>
        <h3>DISC stands for “Dominance, Influence, Steadiness and Conscientiousness,” which are the four primary personality traits the test measures.</h3>
        <br>
        <h3><i>D = Dominance</i></h3>
        <h4>Direct</h4>
        <h4>Results-Oriented</h4>
        <h4>Decisive</h4>
        <h4>Competitive</h4>
        <h4>Problem Solver</h4>
        <br>
        <h3><i>I = Influence</i></h3>
        <h4>Charming</h4>
        <h4>Enthusiastic</h4>
        <h4>Optimistic</h4>
        <h4>Persuasive</h4>
        <h4>Inspiring</h4>
        <br>
        <h3><i>S = Steadiness</i></h3>
        <h4>Understanding</h4>
        <h4>Team Player</h4>
        <h4>Patient</h4>
        <h4>Stable</h4>
        <h4>Sincere</h4>
        <br>
        <h3><i>C = Conscientiousness</i></h3>
        <h4>Analytical</h4>
        <h4>Diplomatic</h4>
        <h4>Precise</h4>
        <h4>Compliant</h4>
        <h4>Objective</h4>
        <br>
        <br>
    </div>
      </div>

      <div class="tab" >
    <h2 style="color:black"><b>DISC</b></h2>
    <h3 style="color:black"><b>Choose the only one word in each row that you feel describes you best right now.</b></h3>
      <div class="formpattern">
        <div class="content" style="width: auto;"> 01
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans1" name="disc_ans1" value="S">I value cooperation over competition
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans1" name="disc_ans1" value="D"> I have a strong need for power
        </label>
        <label class="btn btn-secondary" style="border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans1" name="disc_ans1" value="C"> I am emotionally reserved
        </label>
        <label class="btn btn-secondary" style="border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans1" name="disc_ans1" value="I"> I tend to be more expressive
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">02
        <div class="btn-group"  data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;"> 
        <input type="radio" name="disc_ans2"  value="D"> I am always on the look out for ways to make money
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans2" value="C"> I want strangers to love me
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans2" value="I"> I make lots of noise
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans2" value="S"> I satisfied with my work
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;"> 03
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans3"  value="S"> I just want everyone to be equal
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans3" value="I"> I seldom toot my own horn
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans3" value="D"> I read the fine print
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans3" value="C"> I always create a precise decision
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">04
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans4"  value="D">I try to outdo others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans4" value="C"> I am unpredictable person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans4" value="S"> I am indecisive person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans4" value="I"> I never doubting with others
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">05
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans5"  value="C"> I like to be respect
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans5" value="I"> I like to be more out-going
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans5" value="S"> I am a patient person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans5" value="D"> I am a brave person
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">06
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans6"  value="I"> I like to persuasive other
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans6" value="D"> I prefer to be self-reliant
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans6" value="C"> I like to think logically
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans6" value="S">I prefer to be gentle
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">07
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans7"  value="C"> I more cautious with my surrounding
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans7" value="S"> I am an even-tempered person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans7" value="D"> I like to be decisive
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans7" value="I">I daily life more to life-of-the-party
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">08
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans8"  value="I"> I want to be a popular
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey; font-size: 20px;">
        <input type="radio" name="disc_ans8" value="D"> I prefer to be assertive person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans8" value="C"> I a person which like to be a perfectionist
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans8" value="S">I generous with others
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">09
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary"  style="font-size: 20px;">
        <input type="radio" name="disc_ans9"  value="I"> I like my work to be colorful
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans9" value="C"> I prefer to be modest in my life
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans9" value="S"> I am person easy-going with others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans9" value="D">I unyielding with lazy friends
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">10
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans10"  value="C"> I prefer to do work with systematic
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans10" value="I"> I optimistic with my work
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans10" value="D"> I like to show my persistent to get something
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans10" value="S">I like to accomodating my more needed friends
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">11
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans11"  value="D"> I like to do work relentless
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans11" value="C"> I am a humble person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans11" value="S"> I like to neighborly with anyone
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans11" value="I"> I like to talkative with person older than me
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">12
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans12"  value="S"> I am a friendly person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans12" value="C"> I am a observant person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans12" value="I"> I am a playful person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans12" value="D">I am a person with strong-willed too thing
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">13
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans13"  value="I"> I like to be charming
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans13" value="D"> I am a adventurous person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans13" value="C"> I like to be with disciplined friends
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans13" value="S">I like to create a deliberate results
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">14
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans14"  value="C"> I like to be restrained
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans14" value="S"> I like to  be look steady
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans14" value="D"> I am aggressive person during work
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans14" value="I">I like to be more attractive
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">15
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans15"  value="I"> I am a enthusiastic person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans15" value="C"> I like to do analytical thing
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans15" value="S"> I easy to sympathetic with others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans15" value="D">I always determined my decision
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">16
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans16"  value="D"> I like to commanding others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans16" value="I"> I like to make impulsive decisio
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans16" value="S"> I like to do work with slow-paced
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans16" value="C">I like to think a critical work
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">17
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans17"  value="C"> I like to be more Consistent
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans17" value="D"> I have a force-of-character
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans17" value="I"> I like to do thing more lively
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans17" value="S">I like to do work slowly
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">18
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans18"  value="I"> I am a influential person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans18" value="S"> I am a kind person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans18" value="D"> I like to be more independent
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans18" value="C"> I like to do work orderly
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">19
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans19"  value="C"> I am an Idealistic person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans19" value="I"> I am popular among others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans19" value="S"> I like to solve the task pleasant first
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans19" value="D">I like to be an out-spoken
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">20
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans20"  value="D"> I am an impatient person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px">
        <input type="radio" name="disc_ans20" value="C"> I like to do work seriously
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans20" value="S"> I am a procrastinator person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans20" value="I">I am an emotional person
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">21
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans21"  value="D"> I like to be more competitive with others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans21" value="I"> I like to do spontaneous action
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans21" value="S"> I like to be loyal with others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans21" value="C">I prefer to be more thoughful
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">22
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans22"  value="C"> I like to be more self-sacrificing
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans22" value="S"> I like to considerate others decision
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans22" value="I"> I like to convincing others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans22" value="D">I am a courageous person
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">23
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans23"  value="S"> I like to dependent with my family
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans23" value="I"> I like to be more flighty with my dream
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans23" value="C"> I am a stoic person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans23" value="D">I a person like to pushy others
        </label>
        </div>
        </div>
        <br>
        <div class="content" style="width: auto;">24
        <div class="btn-group" data-toggle="buttons" style="padding-top:5px;">
        <label class="btn btn-secondary" style="font-size: 20px;">
        <input type="radio" name="disc_ans24"  value="S"> I am a tolerant person
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans24" value="C"> I more like to be more conventional
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans24" value="I"> I very fast in stimulating others
        </label>
        <label class="btn btn-secondary" style=" border-left : 1px solid grey;font-size: 20px;">
        <input type="radio" name="disc_ans24" value="D">I like to directing others
        </label>
        </div>
        </div>
        </div>
        <br>

  </div>


  <div style="overflow:auto;">
    <div style="text-align:right">
      <h7 class="blink" style="color:red; font-size: 20px">Click <i>Next</i> to proceed</h7>
    </div>
    <div style="float:right;">
      <button type="button" class="btn btn-primary this_btn" style="color: #000;" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="btn btn-primary this_btn" id="nextBtn" onclick="nextPrev(1);window.scrollTo(0, 0);" >Next</button>
	  <input type="submit" id="hiddensub" name="submit_all" value="Submit" style="display:none;">
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>



	</form> <?php  ?>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("hiddensub").click();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" ) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

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