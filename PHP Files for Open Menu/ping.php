<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

echo "Connected";
?>
