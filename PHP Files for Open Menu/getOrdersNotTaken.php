<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

$breakfast = $_POST['breakfast'];
$lunch = $_POST['lunch'];
$supper = $_POST['supper'];

$sql="SELECT orderID FROM orders";


$firstValueSet = 0;
if($breakfast == 1){
    $sql = $sql." WHERE mealTime = 'Breakfast'";
    $firstValueSet = 1;
}
if($lunch == 1){
    if($firstValueSet == 1){
        $sql = $sql." AND mealTime = 'Lunch'";
    } else {
        $sql = $sql." WHERE mealTime = 'Lunch'";
        $firstValueSet = 1;
    }
}
if($supper == 1){
    if($firstValueSet == 1){
        $sql = $sql." AND mealTime = 'Supper'";
    } else {
        $sql = $sql." WHERE mealTime = 'Supper'";
        $firstValueSet = 1;
    }
}

print_r($sql);

// query to database
$query=@mysqli_query($conn, $sql);

echo mysqli_error();

// if connection worked display all values
while($order=mysqli_fetch_array($query)){
      echo $order['orderID']."|".$order['roomID']."|"
          .$order['fName']."|".$order['lName']."|"
          .$order['primaryDish']."|".$order['sides']."|"
          .$order['drinks']."|".$order['desserts']."|"
          .$order['month']."|".$order['day']."|"
          .$order['year']."|".$order['ordered']."|"
          .$order['served']."|".$order['mealTime'];
        echo "/";
}
?>