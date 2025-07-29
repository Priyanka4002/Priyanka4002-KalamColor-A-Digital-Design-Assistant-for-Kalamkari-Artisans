<?php 
$uname = $_POST['t1']; 
$pwd = $_POST['t2']; 
$cpwd = $_POST['t3']; 
$email = $_POST['t4'];  
$servername = "localhost:3306/varshi";
$username = "root";
$password = "";
$dbname = "myDB1";

// Create a connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Database connected<br>";
}

// Validate passwords
if (strcmp($pwd, $cpwd) != 0) {
    echo "Password and confirm password do not match.";
    exit;
}

// Insert the record into the database
$insert_cmd = "INSERT INTO user1(username, password, confirm_password, email) VALUES ('$uname', '$pwd', '$cpwd', '$email')";
if (mysqli_query($con, $insert_cmd)) {
    echo "Record inserted successfully<br>";
    // Redirect to main.html after successful registration
    header("Location: main.html");
    exit; // Ensure no further code is executed
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
