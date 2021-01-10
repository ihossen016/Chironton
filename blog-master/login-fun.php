<?php
session_start();
include "db-connect.php";

if(isset($_POST['email']) && isset($_POST['password'])){
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
	   	$data = htmlspecialchars($data);
	   	return $data;
	}
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

	$result = mysqli_query($connect, $sql);

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
           if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['name'] = $row['username'];
            	$_SESSION['id'] = $row['id'];
			    $_SESSION['type'] = $row['admin'];
            	header("Location: index.php");
		        exit();
           }
		else{
				echo ' <script type="text/javascript"> alert("Incorect Username or Password")
				</script> ';
		        exit();
			}
		}
		else{
				echo ' <script type="text/javascript"> alert("Incorect Username or Password")
				</script> ';
	        	exit();
	
}
}
else{
	header("Location: login.php");
	exit();
}