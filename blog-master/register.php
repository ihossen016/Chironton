<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Register</title>
</head>

<body>

  <!-- header -->
  
  <header class="clearfix">
    <div class="logo">
      <a href="index.php">
        <h1 class="logo-text">Chitornton</h1>
      </a>
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <li><a href="register.php">Sign up</a></li>
        <li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
      </ul>
    </nav>
  </header>
  
  <!-- // header -->

  <div class="auth-content">
    <form action="register.php" method="post">
      <h3 class="form-title">Register</h3>
      <!-- <div class="msg error">
        <li>Username required</li>
      </div> -->
      <div>
        <label>Name</label>
        <input type="text" name="name" class="text-input">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
      </div>
      <div>
        <button type="submit" name="insert" class="btn">Register</button>
      </div>
      <p class="auth-nav">Or <a href="login.php">Sign In</a></p>
    </form>
  </div>

<?php
	
	$connection = mysqli_connect("localhost", "root", "", "chironton");
	if(isset($_POST['insert']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query = "INSERT INTO users (name, email, password) 
		VALUES ('$name', '$email', '$password')";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run === true)
		{
			echo ' <script type="text/javascript"> alert("Account Created. Please Login..") </script> ';
		}
		else
		{
			echo ' <script type="text/javascript"> alert("Error") </script> ';
		}
	}

?>

</body>

</html>