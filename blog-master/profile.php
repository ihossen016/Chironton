<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="admin.css">

  <title>Profile</title>
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
    <!-- Left Sidebar  -->
    <div class="left-sidebar">
     
<?php
session_start();
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
        <a href="add-post.php" class="btn btn-sm">Add Post</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Posts</h2>
        <table>
          <thead>
            <th>Title</th>
            <th>Date</th>
          </thead>
          <tbody>
           
<?php

	include "db-connect.php";
	
	$userid = $_SESSION['id'];
	
			
	$query = "SELECT title, date FROM post WHERE 
	user_id = '$userid'";
	$query_run = mysqli_query($connect, $query);
	
	if(mysqli_num_rows($query_run) > 0)
	{
		while($row = mysqli_fetch_assoc($query_run)){
			
			echo "<tr class='rec'>";
            echo  	"<td>";
            echo    "<a href='#'>" . $row['title'] . "</a>";
            echo  "</td>";
            echo  "<td>" . $row['date'] . "</td>";
            echo "</tr>";		
		}
	}
	else {
		echo "0 results";
	}
	
?>
         
          </tbody>
        </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>

</body>
</html>