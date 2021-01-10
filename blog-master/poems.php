<html>
<head>
	<title>Poems</title>
	<link rel="stylesheet" href="style.css">
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
	
	
	  <div class="page-wrapper">

    <!-- content -->
    <div class="content clearfix">
      <div class="page-content">
       
        <h1 class="recent-posts-title">Poems</h1>
        
<?php
		 $connect = mysqli_connect("localhost", "root", "", "chironton");
            
			$query = "SELECT id, title, picture, date FROM post WHERE topic='poem'";
			$query_run = mysqli_query($connect, $query);
			while ($row = mysqli_fetch_array($query_run))
			{
					$postid = $row['id'];
					echo "<div class='post clearfix'>";
					echo	  "<img src='images/" .$row['picture']. "' class='post-image'>";
					echo	  "<div class='post-content'>";
					echo		"<h2 class='post-title'><a href='single.php?postid= $postid'>" 
								.$row['title']. "</a></h2>";
					echo		"<div class='post-info'>";
					echo		  "<i class='fa fa-calendar'></i>" .$row['date']. "";
					echo		"</div>";						
					echo		"<a href='single.php?postid= $postid' class='read-more'>Read 
								More</a>";
					echo	  "</div>";
					echo	"</div>";	
			}  
?>      
      </div>
    </div>
    <!-- // content -->

  </div>
</body>
</html>