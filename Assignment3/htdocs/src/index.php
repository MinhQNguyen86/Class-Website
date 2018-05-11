<?php
   include("config.php");
   session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT username FROM s_data WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      $sql0 = "SELECT username FROM s_data WHERE username = '$myusername' and password = '$mypassword' and ID = 0";
      $sql1 = "SELECT username FROM s_data WHERE username = '$myusername' and password = '$mypassword' and ID = 1";
      $sql2 = "SELECT username FROM s_data WHERE username = '$myusername' and password = '$mypassword' and ID = 2";
      $result0 = mysqli_query($db,$sql0);
      $result1 = mysqli_query($db,$sql1);
      $result2 = mysqli_query($db,$sql2);

      $count0 = mysqli_num_rows($result0);
      $count1 = mysqli_num_rows($result1);
      $count2 = mysqli_num_rows($result2);

      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         if ($count0 == 1) {
         	$_SESSION['id'] = 0;
         } elseif ($count1 == 1) {
         	$_SESSION['id'] = 1;
         } elseif ($count2 == 1) {
         	$_SESSION['id'] = 2;
         }
         header("Location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
	<title>Login</title>
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
            <div style = "background-color:#62ce1e; color: #FFF; padding:3px; border-radius: 8px 8px 0px 0px;" align = "center"><b>Login</b></div>

            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label><b>Username:</b></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label><b>Password:</b></label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit " style = "padding: 3px;" /><br />
               </form>
               <form action = "registerS.php" method = "post">
               		<input type = "submit" value = " Register as Student" style = "padding: 3px; margin: 1.5em 0px 0px 0px;" /><br />
               </form>
               <form action = "registerT.php" method = "post">
               		<input type = "submit" value = " Register as TA" style = "padding: 3px; margin: 1.5em 0px 0px 0px;" /><br />
               </form>
               <form action = "registerP.php" method = "post">
               		<input type = "submit" value = " Register as Professor" style = "padding: 3px; margin: 1.5em 0px 0px 0px;" /><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>