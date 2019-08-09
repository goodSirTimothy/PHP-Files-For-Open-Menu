<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$breakfast = $_POST['breakfast'];
$lunch = $_POST['lunch'];
$supper = $_POST['supper'];

$sql="SELECT * FROM orders INNER JOIN room ON orders.roomID=room.roomID ";

// MySQL query
$firstValueSet = 0;
if($breakfast == 1){
    if($day == 0){
        $sql=$sql."WHERE month = ".$month." AND year = ".$year;
    } else if ($month == 0){
        $sql=$sql."WHERE  day = ".$day." AND year = ".$year;
    } else {
        $sql=$sql."WHERE month = ".$month." AND day = ".$day." AND year = ".$ye$
    }
    $sql = $sql." AND mealTime = 'Breakfast'";
    $firstValueSet = 1;
}
if($lunch == 1){
    if($firstValueSet == 1){
        if($day == 0){
            $sql=$sql."OR month = ".$month." AND year = ".$year;
        } else if ($month == 0){
            $sql=$sql."OR  day = ".$day." AND year = ".$year;
        } else {
            $sql=$sql."OR month = ".$month." AND day = ".$day." AND year = ".$year;
        }
        $sql = $sql." AND mealTime = 'Lunch'";
    } else {
        if($day == 0){
            $sql=$sql."WHERE month = ".$month." AND year = ".$year;
        } else if ($month == 0){
            $sql=$sql."WHERE  day = ".$day." AND year = ".$year;
        } else {
            $sql=$sql."WHERE month = ".$month." AND day = ".$day." AND year = ".$year;
        }
        $sql = $sql." AND mealTime = 'Lunch'";
        $firstValueSet = 1;
    }
}
if($supper == 1){
    if($firstValueSet == 1){
        if($day == 0){
            $sql=$sql."OR month = ".$month." AND year = ".$year;
        } else if ($month == 0){
            $sql=$sql."OR  day = ".$day." AND year = ".$year;
        } else {
            $sql=$sql."OR month = ".$month." AND day = ".$day." AND year = ".$year;
        }
        $sql = $sql." AND mealTime = 'Supper'";
    } else {
        if($day == 0){
            $sql=$sql."WHERE month = ".$month." AND year = ".$year;
        } else if ($month == 0){
            $sql=$sql."WHERE  day = ".$day." AND year = ".$year;
        } else {
            $sql=$sql."WHERE month = ".$month." AND day = ".$day." AND year = ".$year;
        }
        $sql = $sql." AND mealTime = 'Supper'";
    }
}

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
// print_r();
?>
