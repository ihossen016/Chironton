<?php

$host="localhost";
$user="root";
$password="";
$db="chironton";

$connect = mysqli_connect($host, $user, $password, $db);

if(!$connect){
	echo "Connection failed!";
}
