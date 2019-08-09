<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];
$table = $_POST['table'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

// MySQL query
$sql="SELECT * FROM bfastMenu";

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
