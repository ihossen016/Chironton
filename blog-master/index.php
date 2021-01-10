<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css">

  <title>Chironton</title>
</head>

<body>

  <!-- header -->
  

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
  <!-- // header -->

  <!-- Page wrapper -->
  <div class="page-wrapper">

    <!-- Posts Slider -->
    <div class="posts-slider">
      <h1 class="slider-title">Trending Posts</h1>
      <i class="fa fa-chevron-right next"></i>
      <i class="fa fa-chevron-left prev"></i>

      <div class="posts-wrapper">
       
 <?php
		  $connect = mysqli_connect("localhost", "root", "", "chironton");
            
			$query = "SELECT id, title, picture, user_id, date FROM post ORDER BY id DESC";
			global	$query_run;
			$query_run = mysqli_query($connect, $query);
			$i = 0;
			while ($row = mysqli_fetch_assoc($query_run))
			{
				$postid = $row['id'];
				if($i==3){
					break;
				}
				else{
				echo	"<div class='post'>";
				echo		  "<div class='inner-post'>";
				echo			"<img src='images/" .$row['picture']. "' style='height: 200px; 
				width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;'>";
				echo			"<div class='post-info'>";
				echo			  "<h4><a href='single.php?postid= $postid'>" .$row['title']. "</a></h4>";
				echo				"<div>";
				echo				  "<i class='fa fa-calendar'></i>" .$row['date']. ""; 
				echo				"</div>";
				echo			"</div>";
				echo		  "</div>";
				echo	"</div>";
				}
				$i++;
			}
        
        
?>      
      </div>
    </div>
    <!-- // Posts Slider -->

    <!-- content -->
    <div class="content clearfix">
      <div class="page-content">
       
        <h1 class="recent-posts-title">Recent Posts</h1>
        
<?php
		 $connect = mysqli_connect("localhost", "root", "", "chironton");
            
			$query = "SELECT id, title, picture, date FROM post ORDER BY id DESC";
			$query_run = mysqli_query($connect, $query);
			$i = 0;
			while ($row = mysqli_fetch_array($query_run))
			{
				$postid = $row['id'];
				if($i == 5)
				{
					break;
				}
				else
				{
					echo "<div class='post clearfix'>";
					echo	  "<img src='images/" .$row['picture']. "' class='post-image'>";
					echo	  "<div class='post-content'>";
					echo		"<h2 class='post-title'><a href='single.php?postid= $postid'>" 
								.$row['title']. "</a>
					</h2>";
					echo		"<div class='post-info'>";
					echo		  "<i class='fa fa-calendar'></i>" .$row['date']. "";
					echo		"</div>";						
					echo		"<a href='single.php?postid= $postid' class='read-more'>Read 
					More</a>";
					echo	  "</div>";
					echo	"</div>";
				}
				$i++;
				
			}  
?>      
      </div>
      
      
      <div class="sidebar">

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