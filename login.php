<?php
	session_start();

	if(isset($_POST['login'])){
		//connection
		$conn = new mysqli('localhost', 'root', '', 'advising');

		//get the user with the email
		$sql = "SELECT * FROM student WHERE matric_no = '".$_POST['matric']."'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			//verify password
			if(password_verify($_POST['password'], $row['password'])){
				//action after a successful login
				//for now just message a successful login
				$_SESSION['success'] = 'Login successful';
				$_SESSION['matric'] = $_POST['matric'];
			}
			else{
				$_SESSION['error'] = 'Password incorrect';
			}
		}
		else{
			$_SESSION['error'] = 'User does not exist or not register yet!';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up login form first';
	}

	header('location: index.php');

?>