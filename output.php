<!DOCTYPE html>
<?php
	session_start();

	$conn = mysqli_connect('localhost','root','','advising');

	$matric_no = $_SESSION['matric'];
	
	$sql_r = "SELECT * FROM riasec_test WHERE MATRIC_NO = '$matric_no'";
	$result_r = mysqli_query($conn, $sql_r);
    $row_r = mysqli_fetch_assoc($result_r);
	
	$sql_d = "SELECT * FROM disc_test WHERE MATRIC_NO = '$matric_no'";
	$result_d = mysqli_query($conn, $sql_d);
    $row_d = mysqli_fetch_assoc($result_d);
	
	$sql_c = "SELECT * FROM suggested_course WHERE MATRIC_NO = '$matric_no'";
	$result_c = mysqli_query($conn, $sql_c);
    $row_c = mysqli_fetch_assoc($result_c);

  
?>
<html>
<title>YOUR RECOMMENDED SUBJECT RESULT</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link name="favicon" type="image/x-icon" href="img/Plaet_Arcadia.jpg" rel="shortcut icon">
  <link rel="stylesheet" href="css/jquery.webui-popover.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link name="favicon" type="image/x-icon" href="img/Plaet_Arcadia.jpg" rel="shortcut icon">
    <!-- font awesome 5 -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
    <link rel="stylesheet" href=css/toastr.css">
    <link rel="stylesheet" href="css/jquery.nestable.min.css">
    <script src="css/jquery-3.3.1.min.js"></script>

<style>
* {
  box-sizing: border-box;
  left-margin: 100px;
  
}

body {
  background-color: #f1f1f1;
  left-margin: 100px;
}



h1 {
  text-align: center;  
}

input[type=text] {
  padding: 10px;
  width: 50%;
  font-size: 17px;
  font-family: Arial;
  border: 1px solid #aaaaaa;
}


/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}




.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
label {
  width:215px;
  height:35px;
  color:black;
  margin: auto;
  
}
.formpattern{
  border: 1px solid grey;
  border-radius: 4px;
  padding: 1px;
  margin: auto;
  background-color: #f4f9f9;
}

}
.active{
  background-color:#d3ffc9;
  color: black;
}
.content {
  font-family:Arial;
}
  
.modal-body{
  text-align:center;
}

.div {
  height: 200px;
  width: 50%;
  background-color: powderblue;
}

.classname a {
    color: #FFFFFF;
    text-decoration: none;
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

h4 {
    background: green;
    padding: 17px 5px;
    color: black;
    

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
<section class="home-banner-area" style="color: black; padding: 10px 10px">
<div class="content-wrapper">
<div class="container-fluid">
  <form action="form(3).php" method="POST" style="width:100%">
    <div class="row">

  
  </div>
  <!-- One "tab" for each step in the form: -->
  <div class="row">
  <div class="this_card">
    <div class="card_header special_header" style="color:black">
      <h3 class="blink"><b>Recommended Result</b></h3>
      <p style="font-size: 16px;";>Based on the analysis, you are suggest to take the subject below based on the year of study: </p>
    </div>
    
    <div class="card_body">   
		<div class="table-responsive">
                        <div id="txtHint2">
                            <table class="table table-bordered" style="border: 2px solid black; font-size:18px;" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="color: #000;">Year 2 Semester 1</th>
                                        <th style="color: #000;">Year 2 Semester 2</th>
                                        <th style="color: #000;">Year 3 Semester 1</th>
                                        <th style="color: #000;">Year 3 Semester 2</th>
                                    </tr>
                                </thead>

                                <tbody>
									<tr>
                                    <td><?php echo $row_c['subject1'];?></td>
									<td><?php echo $row_c['subject3'];?></td>
									<td><?php echo $row_c['subject6'];?></td>
									<td><?php echo $row_c['SUBJECT8'];?></td>
									</tr>
									
									<tr>
                                    <td><?php echo $row_c['subject2'];?></td>
									<td><?php echo $row_c['subject4'];?></td>
									<td><?php echo $row_c['subject7'];?></td>
									<td><?php echo $row_c['SUBJECT9'];?></td>
									</tr>
									
									<tr>
									<td> </td>
									<td><?php echo $row_c['subject5'];?></td>
									<td> </td>
									<td><?php echo $row_c['SUBJECT10'];?></td>
									</tr>
                                </tbody>

                                

                            </table>

                        </div>
                    </div>
                    <div>
                    <h3 class="blink" style="color: red; font-size:20px">Click to show subject summary</h3>
                    <a href="subjectfile.php" style="text-decoration:none;" class="btn btn-primary this_btn">Subject Summary</a>
                    <br>
                    </div>
          <br>
          <div class="justify">
             <div class="container-fluid this_container">
               <div class="justify_header">
                 <h3 class="blink" style="color:black; background: #ec5252">For your information</h3>
               </div>
               <div class="justify_content">
                 <?php
                    $sql_score = "SELECT * FROM demographic_students WHERE MATRIC_NO = '$matric_no'";
                    $result = $conn->query($sql_score); 
                    if ($result->num_rows > 0) {
                      while ($res = $result->fetch_assoc()) {
                        $score_programming = $res['score_programming'];
                        $score_discrete = $res['score_discrete'];
                        $score_calculus = $res['score_calculus'];
                        $score_ai = $res['score_ai'];
                        $score_hdp = $res['SCORE_HDP'];
                        $score_neuroscience = $res['SCORE_NEUROSCIENCE'];
                        $score_linguistic = $res['SCORE_LINGUISTIC'];
                        $score_cogpsychology = $res['SCORE_COGPSYCHOLOGY'];
                        $score_cognitionDesign = $res['score_cognitionDesign'];
                      }
                    }
                    $sql2 = "SELECT * FROM disc_test WHERE matric_no = '$matric_no' ORDER BY DISC_TEST_ID DESC LIMIT 1";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                      while ($res = $result2->fetch_assoc()) {
                        $category_d = $res['category_d'];
                        $category_i = $res['category_i'];
                        $category_s = $res['category_s'];
                        $category_c = $res['category_c']; 
                      }
                    }
                    $array = array('d'=>$category_d, 'i'=>$category_i, 's'=>$category_s, 'c'=>$category_c);
                    $max_score = max($array);
                    $disc_category = array_keys($array, max($array));
                    $le = sizeof($disc_category);
                    $personality_d = '';
                    $personality_i = '';
                    $personality_s = '';
                    $personality_c = '';
                    for ($i = 0; $i<$le; $i++){
                      $disc[$i] = $disc_category[$i];
                      if($disc[$i] == 'd'){     
                        $personality_d = $disc[$i];           
                      }
                      elseif($disc[$i] == 'i'){
                        $personality_i = $disc[$i];
                        
                      }
                      elseif($disc[$i] == 's'){
                        $personality_s = $disc[$i];
                        
                      }
                      else{
                        $personality_c = $disc[$i];
                        
                      }
                    }

                    $sql = "SELECT * FROM riasec_test WHERE MATRIC_NO = '$matric_no' ORDER BY RIASEC_TEST_ID DESC LIMIT 1";
                      // print_r($sql);
                    $result = $conn->query($sql); 
                      if ($result->num_rows > 0) {
                        while ($res = $result->fetch_assoc()) {
                          $total_r = $res['total_r'];
                          $total_i = $res['total_i'];
                          $total_a = $res['total_a'];
                          $total_s = $res['total_s'];
                          $total_e = $res['total_e'];
                          $total_c = $res['total_c'];
                        }
                      }
                      $riasec_array = array('R' => $total_r, 'I' => $total_i, 'A' => $total_a, 'S' => $total_s, 'E' => $total_e, 'C' => $total_c);
                      $riasec_score = max($riasec_array);     
                      $riasec_category = array_keys($riasec_array, max($riasec_array)); ## which category R or I or ... etC   
                      $length = sizeof($riasec_category);

                      $riasec_strength_r = '';
                      $riasec_strength_i = '';
                      $riasec_strength_a = '';
                      $riasec_strength_s = '';
                      $riasec_strength_e = '';
                      $riasec_strength_c = '';

                      for($i = 0; $i< $length; $i++){
                          $riasec[$i] = $riasec_category[$i];
                          if($riasec[$i] == 'R'){
                            $riasec_strength_r = $riasec[$i];  
                          }
                          elseif ($riasec[$i] == 'I') {
                            $riasec_strength_i = $riasec[$i];  
                          }
                          elseif ($riasec[$i] == 'A') {
                            $riasec_strength_a = $riasec[$i];  
                          }
                          elseif ($riasec[$i] == 'S') {
                            $riasec_strength_s = $riasec[$i];  
                          }
                          elseif ($riasec[$i] == 'E') {
                            $riasec_strength_e = $riasec[$i];  
                          }
                          else {
                            $riasec_strength_c = $riasec[$i];  
                          }
                      } 
                    echo'
                      <h4>
                        The suggested course was based on your previous result, RIASEC Test and DISC Test. 
                      </h4>
                      <hr>

                      <div class="row">
                      <div class="col-sm-4 cover_this">
                      <p><b> YOUR RESULT: </b></p>
                      <p>
                        Basic Programming Grade = '.$score_programming.' 
                      </p>
                      <p>
                        Discrete Structure Grade = '.$score_discrete.' 
                      </p>
                      <p>
                        Calculus Grade = '.$score_calculus.' 
                      </p>
                      <p>
                        Artificial Intelligence Grade = '.$score_ai.' 
                      </p>
                      <p>
                        Cognitive Neuroscience Grade = '.$score_neuroscience.' 
                      </p>
                      <p>
                        Cognitive Psychology Grade = '.$score_cogpsychology.' 
                      </p>
                      <p>
                        Introduction to Linguistic Grade = '.$score_linguistic.' 
                      </p>
                      <p>
                        Human Development Psychology Grade = '.$score_hdp.' 
                      </p>
                      <p>
                        Cognition Design Grade = '.$score_cognitionDesign.'  
                      </p>
                      </div>
                      <div class="vl"></div>

                      
                      <div class="col-sm-4 cover_this">
                        <p>RIASEC TEST RESULT</p>
                        <p>Realistic = '.$total_r.'</p>
                        <p>Investigate = '.$total_i.' </p>
                        <p>Artistic = '.$total_a.' </p>
                        <p>Social = '.$total_s.' </p>
                        <p>Enterprising = '.$total_e.' </p>
                        <p>Conventional = '.$total_c.' </p>
                        <p>Your are more to= '; 
                        if ($riasec_strength_r) {
                            echo 'REALISTIC ';
                        }
                        if ($riasec_strength_i) {
                            echo 'INVESTIGATE ';
                        }
                        if ($riasec_strength_a) {
                            echo 'ARTISTIC ';
                        }
                        if ($riasec_strength_s) {
                            echo 'SOCIAL ';
                        }
                        if ($riasec_strength_e) {
                            echo 'ENTERPRISING ';
                        }
                        if ($riasec_strength_c) {
                            echo 'CONVENTIONAL ';
                        }

                        
                        echo '
                        </p>
                     
                        <div class="vl"></div>


                      </div>
                      <div class="col-sm-4">
                        <p>DISC TEST RESULT</p>
                        <p>Dominance = '.$category_d.'</p>
                        <p>Influence = '.$category_i.'</p>
                        <p>Steadiness = '.$category_s.'</p>
                        <p>Compliance = '.$category_c.'</p>
                        <p>Outstanding Personality = ';
                        if ($personality_d) {
                            echo 'Dominance ';
                        }
                        if ($personality_i) {
                            echo 'Influence ';
                        }
                        if ($personality_s) {
                            echo 'Steadiness ';
                        }
                        if ($personality_c) {
                            echo 'Compliance ';
                        }
                        echo'
                        </p>
                      </div>                    

                      </div>
                    ';
                 ?>
               </div>
             </div>
          </div>
        </div>          
        </div>           
        </div><br>
        <h3 class="blink" style="color: red; font-size:20px">Click <i>Back</i> to retake</h3>
        <a href="form.php" style="text-decoration:none;" class="btn btn-primary this_btn">Back</a>
        <br>

</div>
</div>
</div>
</body>
<footer class="footer-area">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">
                            <a href=""><img src="img/Plaet_Arcadia.jpg" alt="" class="d-inline-block" width="110"></a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav justify-content-md-end footer-menu">
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
</html>
