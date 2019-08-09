<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];
$tableName = $_POST['table'];
$weekID = $_POST['weekID'];
$dayID = $_POST['dayID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

// MySQL query
$sql="SELECT * FROM ".$tableName;

// Prepared statements. I'll figure out how to use these later. But they are
// only really needed if there is user input. And this project trys to avoid us$
//$stmt = $db->prepare('SELECT * FROM ? WHERE weekID = ? AND dayID = ?');
//$stmt->bind_param('si',$table,$weekID,$dayID);
//$stmt->execute();

// query to database
$query=@mysqli_query($conn, $sql);

// if connection worked display all values
while($menu=mysqli_fetch_array($query)){
      echo $menu['weekID'].",".$menu['dayID'].","
      .$menu['mainDish'].",".$menu['side1'].",".$menu['side2']
      .",".$menu['side3'].",".$menu['dessert'];
        echo "/";
}
?>