<?php
include("config.php");
session_start();

$username = "";
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $a1 = mysqli_real_escape_string($db, $_POST['a1']);
  $a2 = mysqli_real_escape_string($db, $_POST['a2']);
  $a3 = mysqli_real_escape_string($db, $_POST['a3']);
  $mid = mysqli_real_escape_string($db, $_POST['midterm']);
  $final = mysqli_real_escape_string($db, $_POST['final']);

  // if (empty($username)) { array_push($errors, "Username is required"); }
  $query = "UPDATE s_data SET a1 = $a1, a2 = $a2, a3 = $a3, midterm = $mid, final = $final WHERE username = $username";
  mysqli_query($db, $query);
  
 }
 
 ?>
