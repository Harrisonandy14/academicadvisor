<?php
	session_start();

	$conn = mysqli_connect('localhost','root','','advising');

	$matric_no = $_SESSION['matric'];
	// print_r($matric_no);

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

	$sql3 = "SELECT * FROM demographic_students WHERE MATRIC_NO = '$matric_no' ORDER BY DEMOGRAPHIC_ID DESC LIMIT 1";
	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
		while ($res = $result3->fetch_assoc()) {
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


	////    subject 1   ////
	if($riasec_strength_c != '' || $riasec_strength_i != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' && $score_discrete == 'A' || $score_discrete == 'B' && $score_calculus == 'A' || $score_calculus == 'B' && $score_ai == 'A'){
	 	$_SESSION['subject1'] = "Expert System and Analysis Design";
	 	
	}
	elseif ($riasec_strength_a != '' || $riasec_strength_r != '' && $personality_i != '' || $personality_s != '' && $score_programming == 'B' || $score_programming == 'C' && $score_discrete == 'C' && $score_cognitionDesign == 'A' || $score_cognitionDesign == 'B' && $score_hdp == 'A' && $score_cogpsychology == 'A' && $score_linguistic == 'A') {
		$_SESSION['subject1'] = "Cognitive Tools For Learning";
		
	}
	elseif ($score_programming == 'D' || $score_programming == 'C' && $score_discrete == 'D' || $score_discrete == 'C' && $score_calculus == 'C' || $score_calculus == 'D' && $score_ai == 'C' || $score_ai == 'D' && $score_cognitionDesign == 'D' || $score_cognitionDesign == 'C' && $score_hdp == 'D' || $score_hdp == 'C' && $score_cogpsychology == 'D'|| $score_cogpsychology == 'C' && $score_linguistic == 'D' || $score_linguistic == 'C') {
		$_SESSION['subject1'] = "Cognitive Tools For Learning";

	}
	else{
		$_SESSION['subject1'] = "Cognitive Tools For Learning";
	}


	////    subject 2   ////
	if ($riasec_strength_c != '' || $riasec_strength_i != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' && $score_discrete == 'A' || $score_discrete == 'B' && $score_calculus == 'A' || $score_calculus == 'B' && $score_ai == 'A') {
		$_SESSION['subject2'] = "Data Mining";
	}
	elseif ($riasec_strength_a != '' || $riasec_strength_r != '' && $personality_i != '' || $personality_s != '' && $score_programming == 'B' || $score_programming == 'C' && $score_discrete == 'C' && $score_cognitionDesign == 'A' || $score_cognitionDesign == 'B' && $score_linguistic == 'A' && $score_cogpsychology == 'A' && $score_hdp == 'A') {
		$_SESSION['subject2'] = "Design Development and Technology Learning";
	}
	elseif ($riasec_strength_a != '' || $riasec_strength_r != '' && $personality_i != '' || $personality_s != '' && $score_programming == 'B' || $score_programming == 'C' && $score_discrete == 'C' && $score_cognitionDesign == 'A' || $score_cognitionDesign == 'B' && $score_hdp == 'A' && $score_cogpsychology == 'A' && $score_linguistic == 'A') {
		$_SESSION['subject2'] = "Design Development and Technology Learning";
		
	}
	elseif ($score_programming == 'D' || $score_programming == 'C' && $score_discrete == 'D' || $score_discrete == 'C' && $score_calculus == 'C' || $score_calculus == 'D' && $score_ai == 'C' || $score_ai == 'D' && $score_cognitionDesign == 'D' || $score_cognitionDesign == 'C' && $score_hdp == 'D' || $score_hdp == 'C' && $score_cogpsychology == 'D'|| $score_cogpsychology == 'C' && $score_linguistic == 'D' || $score_linguistic == 'C') {
		$_SESSION['subject2'] = "Design Development and Technology Learning";

	}
	else{
		$_SESSION['subject2'] = "Design Development and Technology Learning";
	}

	
	
	////    subject 3   ////
	if ($riasec_strength_c != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' && $score_ai == 'A' && $score_discrete == 'A' && $score_calculus == 'A' && $_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject3'] = "Artificial Neural Network";
	}
	elseif ($score_programming == 'A' && $score_ai == 'A' && $score_discrete == 'A' && $score_calculus == 'A' && $_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject3'] = "Artificial Neural Network";
	}
	elseif ($score_hdp == 'A' || $score_hdp == 'B' && $score_cogpsychology == 'A' || $score_cogpsychology == 'B' && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject3'] = "Narrative Inquiries and Discussing Analysis";
	}
	elseif ($riasec_strength_r != '' || $riasec_strength_i != '' && $personality_d != '' || $personality_i != '' && $score_programming == 'C' || $score_programming == 'D' && $score_ai == 'C' || $score_ai == 'D' && $score_discrete == 'C' || $score_discrete == 'D' && $score_calculus == 'C' || $score_calculus == 'D') {
		$_SESSION['subject3'] = "Narrative Inquiries and Discussing Analysis";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining"){
		$_SESSION['subject3'] = "Artificial Neural Network";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning"){
		$_SESSION['subject3'] = "Narrative Inquiries and Discussing Analysis";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Design Development and Technology Learning"){
		$_SESSION['subject3'] = "Narrative Inquiries and Discussing Analysis";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Data Mining"){
		$_SESSION['subject3'] = "Artificial Neural Network";
	}
	else{

	}


	////  subject 4  ////
	if ($riasec_strength_c != '' || $riasec_strength_i != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' && $score_ai == 'A' && $score_discrete == 'A' && $score_calculus == 'A'){
		$_SESSION['subject4'] = "Object Oriented Programming";
	}
	elseif ($riasec_strength_c != '' || $riasec_strength_i != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'B' || $score_programming == 'C' && $score_ai == 'C' || $score_ai == 'D' && $score_discrete == 'B' || $score_discrete == 'C'){
		$_SESSION['subject4'] = "Computer Thinking";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning"){
		$_SESSION['subject4'] = "Computer Thinking";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining"){
		$_SESSION['subject4'] = "Object Oriented Programming";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Data Mining"){
		$_SESSION['subject4'] = "Computer Thinking";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Design Development and Technology Learning"){
		$_SESSION['subject4'] = "Object Oriented Programming";
	}




	////  subject 5  ////
	// if ($riasec_strength_c != '' || $riasec_strength_i != '' || $riasec_strength_r != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' || $score_programming == 'B' && $score_ai == 'B' || $score_ai == 'C' && $score_discrete == 'D' || $score_discrete == 'C' && $score_calculus == 'C' || $score_calculus == 'D'){
	// 	$_SESSION['subject5'] = "Database Management System";
	// }
	// elseif ($riasec_strength_a != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' || $score_programming == 'B' && $score_ai == 'C' || $score_ai == 'D' && $score_discrete == 'C' || $score_discrete == 'D' && $score_calculus == 'A' || $score_calculus == 'D') {
	// 	$_SESSION['subject5'] = "Computer Graphics";
	// }
	if ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $score_programming == 'B' && $score_ai == 'B' || $score_ai == 'C' || $score_ai == 'D' && $score_discrete == 'B' || $score_discrete == 'C'){
		$_SESSION['subject5'] = "Database Management System";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $score_programming == 'B' && $score_ai == 'B' || $score_ai == 'C' || $score_ai == 'D' && $score_discrete == 'B' || $score_discrete == 'C'){
		$_SESSION['subject5'] = "Database Management System";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $riasec_strength_r != '' || $riasec_strength_a != '' || $personality_i != '' && $score_programming == 'A' && $score_ai == 'A' && $score_discrete == 'A' && $score_calculus == 'A'){		
		$_SESSION['subject5'] = "Computer Graphics";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $score_programming == 'A' && $score_ai == 'A' && $score_discrete == 'A' && $score_calculus == 'A'){		
		$_SESSION['subject5'] = "Computer Graphics";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Data Mining"){
		$_SESSION['subject5'] = "Database Management System";
	}
	else{
		$_SESSION['subject5'] = "Database Management System";
	}


	////  SUBJECT 6  /////
	// if ($riasec_strength_r != '' || $riasec_strength_c != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' || $score_programming == 'B'){
	// 	$_SESSION['subject6'] = "Web Programming";
	// }
	// elseif ($riasec_strength_a != '' || $riasec_strength_r != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' || $score_programming == 'B' && $score_calculus == 'A' || $score_calculus == 'B'){
	// 	$_SESSION['subject6'] = "Virtual Reality";
	// }
	if ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Computer Thinking" && $riasec_strength_a != ''){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Computer Thinking" && $riasec_strength_a != '' || $score_programming == 'B' || $score_programming == 'C' || $score_programming == 'D' && $score_discrete == 'B' || $score_discrete == 'C' || $score_discrete == 'D' && $score_ai == 'B' ||$score_ai == 'C' || $score_ai == 'D'){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System" && $score_programming == 'A' && $score_ai == 'A' || $score_ai == 'B' && $score_calculus == 'A' && $riasec_strength_r != '' && $personality_d != '' || $personality_c !=''){
		$_SESSION['subject6'] = "Web Programming";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject6'] = "Web Programming";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Computer Graphics"){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject6'] = "Web Programming";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Computer Graphics"){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Computer Graphics"){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject6'] = "Web Programming";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Computer Graphics"){
		$_SESSION['subject6'] = "Virtual Reality";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject6'] = "Web Programming";
	}
	else{
		$_SESSION['subject6'] = "Virtual Reality";
	}


	////  SUBJRCT 7  ////
	// if ($riasec_strength_s != '' || $riasec_strength_i != '' && $personality_i != '' || $personality_s != ''){
	// 	$_SESSION['subject7'] = "Project Management";	
	// }
	if ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject7'] = "Computer Vision";
	}	
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject4'] == "Object Oriented Programming"){
		$_SESSION['subject7'] = "Computer Vision";
	}
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject7'] = "Computer Vision";
	}		
	elseif ($_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject5'] == "Database Management System") {
		$_SESSION['subject7'] = "Computer Vision";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $score_programming == 'B' || $score_programming == 'C' || $score_programming == 'D' && $score_ai == 'C' ||$score_ai == 'B' || $score_ai == 'D' && $score_calculus == 'C' ||$score_calculus == 'B' || $score_calculus == 'D') {
		$_SESSION['subject7'] = "Project Management";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" || $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis") {
		$_SESSION['subject7'] = "Project Management";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" || $_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis") {
		$_SESSION['subject7'] = "Project Management";
	}		
	else{
		$_SESSION['subject7'] = "Project Management";
	}

	

	////  SUBJECT 8  ////
	if ($score_programming == 'A' && $score_ai == 'A' || $score_ai == 'B' && $score_calculus == 'A' || $score_calculus == 'B' && $_SESSION['subject1'] == "Expert System and Analysis Design" || $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject4'] == "Object Oriented Programming" || $_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($score_programming == 'B' || $score_programming == 'C' || $score_programming == 'D' && $score_ai == 'C' || $score_ai == 'D' && $score_calculus == 'C' || $score_calculus == 'D' && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject4'] == "Computer Thinking") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
	}
	elseif ($score_hdp == 'A' && $score_cogpsychology == 'A' && $score_cognitionDesign == 'A' && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject4'] == "Computer Thinking") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
	}			
	elseif ($_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject5'] == "Database Management System") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject4'] == "Computer Thinking" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	elseif ($_SESSION['subject5'] == "Database Management System" && $_SESSION['subject3'] == "Artificial Neural Network") {
		$_SESSION['subject8'] = "Computational Intelligence";
	}
	// elseif ($riasec_strength_i != '' || $riasec_strength_c != '' && $personality_i != '' || $personality_s != '' && $score_neuroscience == 'A' || $score_neuroscience == 'B' && $score_cogpsychology == 'A' || $score_cogpsychology == 'B' && $score_hdp == 'A' || $score_hdp == 'B' && $score_cognitionDesign == 'A' || $score_cognitionDesign == 'B'){
	// 	$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
	// 			
	// }
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
		
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
		
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
		
	}elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
		
	}
	else{
		$_SESSION['subject8'] = "Neuroscience for Special Needs Kids";
		
	}


	////  SUBJECT 9  ////
	// if ($riasec_strength_r != '' || $riasec_strength_c != '' && $personality_d != '' || $personality_c != '' && $score_programming == 'A' || $score_programming == 'B' && $score_discrete == 'A' || $score_discrete == 'B' && $score_linguistic == 'A' || $score_linguistic == 'B' && $score_ai == 'A' || $score_ai == 'B' && $score_calculus == 'A' || $score_calculus == ' B') {
	// 	$_SESSION['subject9'] = "Computational Linguistics";
	// }
	// elseif ($riasec_strength_i != '' || $riasec_strength_s != '' && $personality_i != '' || $personality_s != '' && $score_hdp == 'B' || $score_hdp == 'C' && $score_cognitionDesign == 'A' || $score_cognitionDesign == 'B'){
	// 	$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	// }
	if ($score_programming == 'A' && $score_ai == 'A' && $score_calculus == 'A' && $score_discrete == 'A' || $score_discrete == 'B' && $personality_d != '' || $personality_c != '' && $riasec_strength_r != '' && $_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject5'] == "Database Management System"){
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($score_programming == 'B' ||$score_programming == 'C' || $score_programming == 'D' && $score_ai == 'B' || $score_ai == 'C' || $score_ai == 'D' && $score_calculus == 'B' || $score_calculus == 'C' || $score_calculus == 'D' && $score_discrete == 'B' || $score_discrete == 'C' || $score_discrete == 'D' && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject7'] == "Project Management"){
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	elseif ($score_hdp == 'A' && $score_neuroscience == 'A' && $score_cogpsychology == 'A' && $score_cognitionDesign == 'A' && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis"){
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" || $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject5'] == "Database Management System") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" || $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject5'] == "Database Management System") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject9'] = "Computational Linguistics";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning") {
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	elseif ($_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject2'] == "Design Development and Technology Learning") {
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}
	else{
		$_SESSION['subject9'] = "Learning Problems in an Inclusive Society";
	}


	////  SUBJECT 10  ////	
	if ($_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System" || $_SESSION['subject5'] == "Computer Graphics" && $score_programming == 'A' && $score_calculus == 'A' && $score_ai == 'A' && $_SESSION['subject7'] == "Computer Vision" && $_SESSION['subject1'] == "Expert System and Analysis Design" && $_SESSION['subject2'] == "Data Mining") {
		$_SESSION['subject10'] = "Mobile Application Development";
	}
	elseif ($_SESSION['subject4'] == "Object Oriented Programming" && $_SESSION['subject5'] == "Database Management System" || $_SESSION['subject5'] == "Computer Graphics" && $_SESSION['subject3'] == "Artificial Neural Network" && $_SESSION['subject2'] == "Data Mining" && $_SESSION['subject1'] == "Expert System and Analysis Design") {
		$_SESSION['subject10'] = "Mobile Application Development";
	}	
	elseif ($_SESSION['subject3'] == "Narrative Inquiries and Discussing Analysis" && $_SESSION['subject1'] == "Cognitive Tools For Learning" && $_SESSION['subject2'] == "Design Development and Technology Learning" && $_SESSION['subject7'] == "Project Management") {
		$_SESSION['subject10'] = "Knowledge-Based System";
	}	
	else{
		$_SESSION['subject10'] = "Knowledge-Based System";
	}


	$subject1 = $_SESSION['subject1'];
	$subject2 = $_SESSION['subject2'];
	$subject3 = $_SESSION['subject3'];
	$subject4 = $_SESSION['subject4'];
	$subject5 = $_SESSION['subject5'];
	$subject6 = $_SESSION['subject6'];
	$subject7 = $_SESSION['subject7'];
	$subject8 = $_SESSION['subject8'];
	$subject9 = $_SESSION['subject9'];
	$subject10 = $_SESSION['subject10']; 

	$sql4 = "INSERT INTO suggested_course (MATRIC_NO, SUBJECT1, SUBJECT2, SUBJECT3, SUBJECT4, SUBJECT5, SUBJECT6, SUBJECT7, SUBJECT8, SUBJECT9, SUBJECT10) VALUES ('$matric_no', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5', '$subject6', '$subject7', '$subject8', '$subject9', '$subject10')";
	
	if (mysqli_query($conn, $sql4)) {
		header('location: output.php');
	} 
	
?>