<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css">

  <title>Motivational Blog</title>
</head>

<body>

<header class="clearfix">
		<div class="logo">
		  <a href="index.php">
			<h1 class="logo-text">Chitornton</h1>
		  </a>
		</div>
		<nav>
		  <ul>
		   <?php session_start(); ?>
		   <?php if(isset($_SESSION['id']) > 0): ?>
			<li><a href="index.php">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="profile.php">Dashboard</a></li>
			<li><a href="logout.php" class="logout">logout</a></li>
			<?php else: ?>
			<li><a href="register.php">Sign up</a></li>
			<li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
			<?php endif; ?> 
		  </ul>
		</nav>
</header>

  <!-- Page wrapper -->
  <div class="page-wrapper">

    <!-- content -->
    <div class="content clearfix">
      <div class="page-content single">
       
<?php
		  $id = $_GET["postid"];
		include ("db-connect.php");
		
		$query = "SELECT * FROM post WHERE id='$id' ";
		$query_run = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($query_run);
		  
		echo	"<img src='images/" .$row['picture']. "'>";
        echo	"<h2 style='text-align: center;'>" .$row['title']. "</h2><br>";

        echo	"<p>" .$row['description']. "</p>";

?>
      </div>

      <div class="sidebar single">

        <!-- topics -->
        <div class="section topics">
          <h2>Topics</h2>
          <ul>
            <a href="poems.php">
              <li>Poems</li>
            </a>
            <a href="fiction.php">
              <li>Fiction</li>
            </a>
            <a href="biography.php">
              <li>Biography</li>
            </a>
            <a href="nature.php">
              <li>Nature</li>
            </a>
            <a href="surfing.php">
              <li>Surfing</li>
            </a>
          </ul>
        </div>
        <!-- // topics -->

      </div>
    </div>
    <!-- // content -->

  </div>
  <!-- // page wrapper -->

  <!-- FOOTER -->
   
    <?php include("footer.php"); ?>
    
  <!-- // FOOTER -->

</body>

</html>