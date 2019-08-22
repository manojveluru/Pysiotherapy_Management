<?php
$servername = "courses";
$username = "z1840907";
$password = "1993Sep15";
$dbname = "z1840907";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//printf("Server version: %d\n", $conn->server_version);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>