<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Login</title>
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
    <form action="login-fun.php" method="post">
      <h3 class="form-title">Login</h3>
      <!-- <div class="msg error">
        <li>Username required</li>
      </div> -->
      <div>
        <label>Email</label>
        <input type="email" name="email" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
      </div>
      <div>
        <button type="submit" name="login-btn" class="btn">Login</button>
      </div>
      <p class="auth-nav">Or <a href="register.php">Sign Up</a></p>
    </form>
  </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="scripts.js"></script>

</body>

</html>