<?php 
	session_start();

	$conn = mysqli_connect('localhost','root','','advising');
	
	$matric_no = $_SESSION['matric'];
	
	$sql_c = "DELETE FROM suggested_course WHERE MATRIC_NO = '$matric_no'";
	
	if (mysqli_query($conn, $sql_c)){
		header ('location: form 1.php');
		}
?>
	