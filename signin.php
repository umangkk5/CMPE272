<?php
	session_start();
	//echo $_SESSION['id'];
	include 'mysql.php';
	if(!empty($_POST)){
		$email = $_POST['email'];
		$password = $_POST['password'];

		echo $email.'-'.$password;

		if($email && $password){
			$sql = "select * from users where email='".$email."' and password='".$password."'";
			echo $sql;
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				$msg= "User logged in successfully";
				$_SESSION['loggedin']=true;
				echo $_SERVER['REQUEST_URI'];
				header('Location:index.php');
			}
			else{
				$msg= "User login failed";
			}
			//echo $msg;
		}
	}

?>