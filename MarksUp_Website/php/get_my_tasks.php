<?php
require 'base_info.php';

$userId = $_POST['userId'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$sql = "SELECT * FROM `tasks` WHERE `user_id`='" . $userId . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo json_encode($row);
  }
} else {
  echo "Error: " . $sql . $conn->error;
//   echo "0 results";
}
$conn->close();

?>
