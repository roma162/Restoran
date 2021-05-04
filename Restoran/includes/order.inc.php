<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO orders (city, address, numb)
VALUES ('$_POST[city]', '$_POST[address]', '$_POST[number]')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("location: ../menu.php");
exit();
?>
