<?php
session_start();
require("include/connection.php");

$datetime = date_create()->format('Y-m-d H:i:s');


if(isset($_POST['farm'])){
	$score = rand(10,20);
	$query = "INSERT INTO activities(activity, datetime, score) VALUES('farm', '$datetime', '$score')";
	mysql_query($query);
	header('location: index.php');

}

if(isset($_POST['cave'])){
	$score = rand(5,10);
	$query = "INSERT INTO activities(activity, datetime, score) VALUES('cave', '$datetime', '$score')";
	mysql_query($query);
	header('location: index.php');
	
}


if(isset($_POST['house'])){
	$score = rand(2,5);
	$query = "INSERT INTO activities(activity, datetime, score) VALUES('house', '$datetime', '$score')";
	mysql_query($query);
	header('location: index.php');
	
}

if(isset($_POST['casino'])){
	$score = rand(-50,50);
	$query = "INSERT INTO activities(activity, datetime, score) VALUES('casino', '$datetime', '$score')";
	mysql_query($query);
	header('location: index.php');
	
}

?>