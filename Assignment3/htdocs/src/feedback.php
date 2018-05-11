<?php session_start(); ?>
<html>
<head>
</head>
<body>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "a3";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM feedback";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo $row["feedback"]; ?> <br /> <?php
    	}
    
	} else {
    	echo "0 results";
	}
	$conn->close();
	?>

</body>
</html>
