<?php
require 'base_info.php';

$dealId = $_POST['dealId'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$sql = "SELECT * FROM `deals` WHERE `id`='" . $dealId . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo json_encode($row);
  }
} else {
  echo "0 results";
}
$conn->close();

?>
