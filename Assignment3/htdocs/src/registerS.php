<?php
include("config.php");
session_start();

$username = "";
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  $user_check_query = "SELECT * FROM s_data WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }
  if (count($errors) == 0) {

  	$query = "INSERT INTO s_data (username, password, ID) 
  			  VALUES('$username', '$password', 0)";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['id'] = 0;
  	header('location: home.php');
  }
 }
 
 ?>

 <!DOCTYPE html>
<html lang='en'>
	<head>
	<title>Register</title>
	<meta charset='UTF-8'/>
	<link rel='stylesheet' href='css/home.css'/>
	<!-- Get fonts from Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab|Ubuntu" rel="stylesheet">
	<style type="text/css">
		* {
			font-family: 'Ubuntu', 'Helvetica', 'Roboto', sans-serif;
			box-sizing: border-box;
			padding: 0px;
		}
		body {
			background-image: radial-gradient(73% 147%, #EADFDF 59%, #ECE2DF 100%), radial-gradient(91% 146%, rgba(255,255,255,0.50) 47%, rgba(0,0,0,0.50) 100%);
			background-blend-mode: screen;
		}
	</style>
	</head>
   
   <body>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #62ce1e; border-radius: 10px; " align = "left">
            <div style = "background-color:#62ce1e; color: #FFF; padding:3px; border-radius: 8px 8px 0px 0px;" align = "center"><b>Register</b></div>

            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Username:</b></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label><b>Password:</b></label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " style = "padding: 3px;" /><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>