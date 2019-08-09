<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

// MySQL query
$sql="SELECT * FROM weeklySpecial";

// query to database
$query=@mysqli_query($conn, $sql);

// if connection worked display all values
while($item=mysqli_fetch_array($query)){
      echo $item['itemID'].",".$item['dayID'].","
      .$item['itemName'].",".$item['itemDescription'];
        echo "/";
}
?>
