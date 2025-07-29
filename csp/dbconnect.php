<?php
$servername = "localhost:3306/varshi";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else
	echo"database connected";
mysqli_close($conn);

?>