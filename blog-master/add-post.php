<?php
	session_start();
	
	$connection = mysqli_connect("localhost", "root", "", "chironton");
	if(isset($_POST['insert']))
	{
		$target = "images/" .basename($_FILES['picture']['name']); 
		
		$img = $_FILES['picture']['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$topic = $_POST['topic'];
		$userid = $_SESSION['id'];
		
		$query = "INSERT INTO post(title, description, topic, picture, user_id) VALUES 
		('$title', '$description', '$topic','$img', '$userid')";
		
		$query_run = mysqli_query($connection, $query);
		//move_uploaded_file($_FILES['picture']['tmp_image'], $target);
		
		if($query_run === true)
		{
			echo ' <script type="text/javascript"> alert("Post Saved") </script> ';
		}
		else
		{
			echo ' <script type="text/javascript"> alert("Error") </script> ';
		}
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="admin.css">

  <title>Admin - Create Post</title>
</head>

<body>

  <!-- header -->
  <header class="clearfix">
    <div class="logo">
      <!-- <img src="images/logo-placeholder.png" alt="Logo"> -->
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="profile.php">Dashboard</a></li>
        <li><a href="logout.php" class="logout">logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- // header -->

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <div class="left-sidebar">
    
<?php

	include "db-connect.php";
	
	$userid = $_SESSION['id'];
			
	$query = "SELECT name, email FROM users WHERE id = '$userid'";
	$query_run = mysqli_query($connect, $query);
	
	if(mysqli_num_rows($query_run) > 0)
	{
		$row = mysqli_fetch_assoc($query_run);
			echo	"<ul>";
			echo		"<li><a href=''>" . $row['name'] . "</a></li>";
			echo		"<li><a href=''>" . $row['email'] . "</a></li>";
			echo	"</ul>";
	}

?>
    </div>
    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="profile.php" class="btn btn-sm">All Posts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Create Post</h2>

        <form action="add-post.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" class="text-input" required>
          </div>
          <div class="input-group">
            <label>Body</label>
            <textarea class="text-input" name="description" required></textarea> 
          </div>
          <div class="input-group">
            <label>Topic</label>
            <select class="text-input" name="topic" required>
              <option value="">---- SELECT ----</option>
              <option value="Poems">Poems</option>
              <option value="Fiction">Fiction</option>
              <option value="Biography">Biography</option>
              <option value="Nature">Nature</option>
              <option value="Surfing">Surfing</option>
            </select>
          </div>
          <div class="input-group">
            <label>Picture</label>
            <input type="file" name="picture" class="text-input" required>
          </div>
          <div class="input-group">
            <button type="submit" name="insert" class="btn">Save Post</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


</body>

</html>