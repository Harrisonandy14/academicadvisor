<?php
	session_start();

	if(isset($_POST['register'])){
		//set database connection
		$conn = new mysqli('localhost', 'root', '', 'advising');

		//check if password matches the confirm password
		if($_POST['password'] == $_POST['confirm_password']){
			//check if email exists in the database
			$sql = "SELECT * FROM student WHERE matric_no = '".$_POST['matric']."'";
			$query = $conn->query($sql);
			if($query->num_rows > 0){
				$_SESSION['error'] = 'You already sign up';
				//return the inputted fields
				$_SESSION['email'] = $_POST['email'];
				header('location: new_account.php');
			}
			else{
				//hash the password
				$hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$sql = "INSERT INTO student (matric_no, password) VALUES ('".$_POST['matric']."', '$hash_password')";
				if($conn->query($sql)){
					//unset user inputs
					($_SESSION['matric']);
					unset($_SESSION['password']);
				
					$_SESSION['success'] = 'Sign Up successfully';
					header('location: index.php');
				}
				else{
					$_SESSION['error'] = 'You might have a problem with the system. Please contact our admin to help you';
					header('location: new_account.php');
				}
			}
		}
		else{
			$_SESSION['error'] = "Passwords did not match";
			//return the inputted fields
			$_SESSION['matric'] = $_POST['matric'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['confirm_password'] = $_POST['confirm_password'];
			header('location: new_account.php');
		}
	}
	else{
		$_SESSION['error'] = "Complete the form";
		header('location: new_account.php');
	}

?>