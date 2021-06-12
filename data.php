<?php
	session_start();

	$conn = mysqli_connect('localhost','root','','advising');

	if (isset($_POST['submit_all'])) {		

		// REALISTIC riasec_ans
		$matric = $_SESSION['matric'];

		if (empty($_POST['score_programming'])|| empty($_POST['score_discrete']) || empty($_POST['score_ai']) || empty($_POST['score_calculus']) || empty($_POST['score_cognitionDesign']) || empty($_POST['score_neuroscience']) || empty($_POST['score_linguistic']) || empty($_POST['score_hdp']) || empty($_POST['score_cogpsychology'])  || empty($_POST['riasec_ans']) || empty($_POST['disc_ans1']) || empty($_POST['disc_ans2']) || empty($_POST['disc_ans3']) || empty($_POST['disc_ans4']) || empty($_POST['disc_ans5']) || empty($_POST['disc_ans6']) || empty($_POST['disc_ans7']) || empty($_POST['disc_ans8']) || empty($_POST['disc_ans9']) || empty($_POST['disc_ans10']) || empty($_POST['disc_ans11']) || empty($_POST['disc_ans12']) || empty($_POST['disc_ans13']) || empty($_POST['disc_ans14']) || empty($_POST['disc_ans15']) || empty($_POST['disc_ans16']) || empty($_POST['disc_ans17']) || empty($_POST['disc_ans18']) || empty($_POST['disc_ans19']) || empty($_POST['disc_ans20'])|| empty($_POST['disc_ans21']) || empty($_POST['disc_ans22']) || empty($_POST['disc_ans23']) || empty($_POST['disc_ans24'])) {
			header('location: form.php?alert');			
		}

		
		// $total_r = $riasec_ans1 + $riasec_ans7 + $riasec_ans14 + $riasec_ans22 + $riasec_ans30 + $riasec_ans32 + $riasec_ans37;
		
		// // Investigative riasec_ans

		
		// $total_i = $riasec_ans2 + $riasec_ans11 + $riasec_ans18 + $riasec_ans21 + $riasec_ans26 + $riasec_ans33 + $riasec_ans39;

		// // Artistic riasec_ans 

		
		// $total_a = $riasec_ans3 + $riasec_ans8 + $riasec_ans17 + $riasec_ans23 + $riasec_ans27 + $riasec_ans31 + $riasec_ans41;

		// // Social riasec_ans

		
		// $total_s = $riasec_ans4 + $riasec_ans12 + $riasec_ans13 + $riasec_ans20 + $riasec_ans28 + $riasec_ans34 + $riasec_ans40;

		// // Enterprising riasec_ans

		
		// $total_e = $riasec_ans5 + $riasec_ans10 + $riasec_ans16 + $riasec_ans19 + $riasec_ans29 + $riasec_ans36 + $riasec_ans42;		

		// // Conventional riasec_ans

		
		// $total_c = $riasec_ans6 + $riasec_ans9 + $riasec_ans15 + $riasec_ans24 + $riasec_ans25 + $riasec_ans35 + $riasec_ans38;	
		$thesql = "SELECT * FROM demographic_students WHERE matric_no = '$matric'";
		$theresult = $conn->query($thesql);	
		if ($theresult->num_rows <= 0){
			$riasec_ans_array = $_POST['riasec_ans'];
			$the_count = array_count_values($riasec_ans_array);
			$the_countR = 0;
			$the_countI = 0;
			$the_countA = 0;
			$the_countS = 0;
			$the_countE = 0;
			$the_countC = 0;
			$the_countR = $the_count['R'];
			$the_countI = $the_count['I'];
			$the_countA = $the_count['A'];
			$the_countS = $the_count['S'];
			$the_countE = $the_count['E'];
			$the_countC = $the_count['C'];

			$sql = "INSERT INTO riasec_test (matric_no, total_r, total_i, total_a, total_s, total_e, total_c) 
			VALUES ('$matric', '$the_countR', '$the_countI', '$the_countA', '$the_countS', '$the_countE', '$the_countC')";
			$conn->query($sql);
			

			// the disc test 
						
			// $disc_ans_array = $_POST['disc_ans'];
			$disc_ans1 = $_POST['disc_ans1'];
			$disc_ans2 = $_POST['disc_ans2'];
			$disc_ans3 = $_POST['disc_ans3'];
			$disc_ans4 = $_POST['disc_ans4'];
			$disc_ans5 = $_POST['disc_ans5'];
			$disc_ans6 = $_POST['disc_ans6'];
			$disc_ans7 = $_POST['disc_ans7'];
			$disc_ans8 = $_POST['disc_ans8'];
			$disc_ans9 = $_POST['disc_ans9'];
			$disc_ans10 = $_POST['disc_ans10'];
			$disc_ans11 = $_POST['disc_ans11'];
			$disc_ans12 = $_POST['disc_ans12'];
			$disc_ans13 = $_POST['disc_ans13'];
			$disc_ans14 = $_POST['disc_ans14'];
			$disc_ans15 = $_POST['disc_ans15'];
			$disc_ans16 = $_POST['disc_ans16'];
			$disc_ans17 = $_POST['disc_ans17'];
			$disc_ans18 = $_POST['disc_ans18'];
			$disc_ans19 = $_POST['disc_ans19'];
			$disc_ans20 = $_POST['disc_ans20'];
			$disc_ans21 = $_POST['disc_ans21'];
			$disc_ans22 = $_POST['disc_ans22'];
			$disc_ans23 = $_POST['disc_ans23'];
			$disc_ans24 = $_POST['disc_ans24'];

			$disc_ans_array = array($disc_ans1, $disc_ans2, $disc_ans3, $disc_ans4, $disc_ans5, $disc_ans6, $disc_ans7, $disc_ans8, $disc_ans9, $disc_ans10, $disc_ans11, $disc_ans12, $disc_ans13, $disc_ans14, $disc_ans15, $disc_ans16, $disc_ans17, $disc_ans18, $disc_ans19, $disc_ans20, $disc_ans21, $disc_ans22, $disc_ans23, $disc_ans24);
			

			$count = array_count_values($disc_ans_array);
			$count_D = 0;
			$count_I = 0;
			$count_S = 0;
			$count_C = 0;
			$count_D = $count['D'];
			$count_I = $count['I'];
			$count_S = $count['S'];
			$count_C = $count['C'];

			$sql1 = "INSERT INTO disc_test (matric_no, category_d, category_i, category_s, category_c) VALUES ('$matric', '$count_D', '$count_I', '$count_S', '$count_C')";
			$conn->query($sql1);
		

			// previous result
			$score_programming = mysqli_real_escape_string($conn, $_POST['score_programming']);
			$score_discrete = mysqli_real_escape_string($conn, $_POST['score_discrete']);
			$score_ai = mysqli_real_escape_string($conn, $_POST['score_ai']);
			$score_calculus = mysqli_real_escape_string($conn, $_POST['score_calculus']);
			$score_cognitionDesign = mysqli_real_escape_string($conn, $_POST['score_cognitionDesign']);
			$score_neuroscience = mysqli_real_escape_string($conn, $_POST['score_neuroscience']);
			$score_linguistic = mysqli_real_escape_string($conn, $_POST['score_linguistic']);
			$score_hdp = mysqli_real_escape_string($conn, $_POST['score_hdp']);
			$score_cogpsychology = mysqli_real_escape_string($conn, $_POST['score_cogpsychology']);
			
			$sql2 = "INSERT INTO demographic_students (matric_no, score_programming, score_discrete, score_cognitionDesign, score_calculus, score_ai, SCORE_NEUROSCIENCE, SCORE_LINGUISTIC, SCORE_HDP, SCORE_COGPSYCHOLOGY) VALUES ('$matric', '$score_programming', '$score_discrete', '$score_cognitionDesign', '$score_calculus', '$score_ai', '$score_neuroscience', '$score_linguistic', '$score_hdp', '$score_cogpsychology')";
			
			$conn->query($sql2);
			header('location: rules.php');
		}
		if ($theresult->num_rows > 0) {
			// while ($res = $theresult->fetch_assoc()) {
			// 	$matric_no = $res['matric_no'];	
			// }
			$riasec_ans_array = $_POST['riasec_ans'];
			$the_count = array_count_values($riasec_ans_array);
			$the_countR = 0;
			$the_countI = 0;
			$the_countA = 0;
			$the_countS = 0;
			$the_countE = 0;
			$the_countC = 0;
			$the_countR = $the_count['R'];
			$the_countI = $the_count['I'];
			$the_countA = $the_count['A'];
			$the_countS = $the_count['S'];
			$the_countE = $the_count['E'];
			$the_countC = $the_count['C'];

			$sql = "UPDATE riasec_test SET total_r = '$the_countR', total_i = '$the_countI', total_a = '$the_countA', total_s = '$the_countS', total_e = '$the_countE', total_c = '$the_countC' WHERE matric_no = '$matric'";			
			$conn->query($sql);
			

			// the disc test 
						
			// $disc_ans_array = $_POST['disc_ans'];
			$disc_ans1 = $_POST['disc_ans1'];
			$disc_ans2 = $_POST['disc_ans2'];
			$disc_ans3 = $_POST['disc_ans3'];
			$disc_ans4 = $_POST['disc_ans4'];
			$disc_ans5 = $_POST['disc_ans5'];
			$disc_ans6 = $_POST['disc_ans6'];
			$disc_ans7 = $_POST['disc_ans7'];
			$disc_ans8 = $_POST['disc_ans8'];
			$disc_ans9 = $_POST['disc_ans9'];
			$disc_ans10 = $_POST['disc_ans10'];
			$disc_ans11 = $_POST['disc_ans11'];
			$disc_ans12 = $_POST['disc_ans12'];
			$disc_ans13 = $_POST['disc_ans13'];
			$disc_ans14 = $_POST['disc_ans14'];
			$disc_ans15 = $_POST['disc_ans15'];
			$disc_ans16 = $_POST['disc_ans16'];
			$disc_ans17 = $_POST['disc_ans17'];
			$disc_ans18 = $_POST['disc_ans18'];
			$disc_ans19 = $_POST['disc_ans19'];
			$disc_ans20 = $_POST['disc_ans20'];
			$disc_ans21 = $_POST['disc_ans21'];
			$disc_ans22 = $_POST['disc_ans22'];
			$disc_ans23 = $_POST['disc_ans23'];
			$disc_ans24 = $_POST['disc_ans24'];

			$disc_ans_array = array($disc_ans1, $disc_ans2, $disc_ans3, $disc_ans4, $disc_ans5, $disc_ans6, $disc_ans7, $disc_ans8, $disc_ans9, $disc_ans10, $disc_ans11, $disc_ans12, $disc_ans13, $disc_ans14, $disc_ans15, $disc_ans16, $disc_ans17, $disc_ans18, $disc_ans19, $disc_ans20, $disc_ans21, $disc_ans22, $disc_ans23, $disc_ans24);
			

			$count = array_count_values($disc_ans_array);
			$count_D = 0;
			$count_I = 0;
			$count_S = 0;
			$count_C = 0;
			$count_D = $count['D'];
			$count_I = $count['I'];
			$count_S = $count['S'];
			$count_C = $count['C'];

			$sql1 = "UPDATE disc_test SET category_d = '$count_D', category_i = '$count_I', category_s = '$count_S', category_c ='$count_C' WHERE matric_no = '$matric'";
			$conn->query($sql1);
		

			// previous result
			$score_programming = mysqli_real_escape_string($conn, $_POST['score_programming']);
			$score_discrete = mysqli_real_escape_string($conn, $_POST['score_discrete']);
			$score_ai = mysqli_real_escape_string($conn, $_POST['score_ai']);
			$score_calculus = mysqli_real_escape_string($conn, $_POST['score_calculus']);
			$score_cognitionDesign = mysqli_real_escape_string($conn, $_POST['score_cognitionDesign']);
			$score_neuroscience = mysqli_real_escape_string($conn, $_POST['score_neuroscience']);
			$score_linguistic = mysqli_real_escape_string($conn, $_POST['score_linguistic']);
			$score_hdp = mysqli_real_escape_string($conn, $_POST['score_hdp']);
			$score_cogpsychology = mysqli_real_escape_string($conn, $_POST['score_cogpsychology']);
			
			$sql2 = "UPDATE demographic_students SET score_programming = '$score_programming', score_discrete = '$score_discrete', score_cognitionDesign = '$score_cognitionDesign', score_calculus = '$score_calculus', score_ai = '$score_ai', SCORE_NEUROSCIENCE = '$score_neuroscience', SCORE_LINGUISTIC = '$score_linguistic', SCORE_HDP = '$score_hdp', SCORE_COGPSYCHOLOGY = '$score_cogpsychology' WHERE matric_no = '$matric'";
			
			$conn->query($sql2);
			header('location: rules.php');

		}
		
		
	}		
	

?>