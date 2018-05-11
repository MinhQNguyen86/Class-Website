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
	$name = $_SESSION['username'];
	$id = $_SESSION['id'];
	if ($id == 0) {
		$sql = "SELECT * FROM s_data WHERE username='$name'";
	} elseif ($id == 2) {
		$sql = "SELECT * FROM s_data";
	}
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "Username: " . $row["username"]. " | A1: " . $row["A1"]. " | A2: " . $row["A2"]. " | A3: " . $row["A3"]. " | Midterm: " . $row["Midterm"]. " | Final: " . $row["Final"]. " <br />";
    	}
    	if ($id == 0) { ?>
    		<form action = "remark.php">
    			<button type = "button";>Remark</button>
    		</form>
    	<?php }
	} else {
    	echo "0 results";
	}
	$conn->close();
	?>

</body>
</html>
