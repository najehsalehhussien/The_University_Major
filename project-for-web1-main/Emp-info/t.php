<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mydb';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create employees table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS employees (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  mail VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  age INT(3) NOT NULL,
  salary DECIMAL(10, 2) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Employees table created successfully.";
} else {
  echo "Error creating employees table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
