<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

// all information POSTed from the android app
$roomID = $_POST['roomID'];
$primaryDish = $_POST['primaryDish'];
$sides = $_POST['sides'];
$drinks = $_POST['drinks'];
$desserts = $_POST['desserts'];
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$ordered = $_POST['ordered'];
$served = $_POST['served'];
$mealTime = $_POST['mealTime'];

// Old test statement. Not needed but it shows how to properly write the prepared statement.
//$stmt = $conn->prepare("INSERT INTO orders (roomID, primaryDish, sides, drinks, desserts, month, day, year, ordered, served) "."VALUES ('10', 'test', 'input', 'data', 'please', '5', '13', '2019', '1', '0')");

// Statement for inserting data
$stmt = $conn->prepare("INSERT INTO orders (roomID, primaryDish, sides, drinks, desserts, month, day, year, ordered, served, mealTime) "."VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $roomID, $primaryDish, $sides, $drinks, $desserts, $month, $day, $year, $ordered, $served, $mealTime);

// execute the statement and see if it's true or not
if($stmt->execute()){
    echo "Insert Complete";
} else {
    // echo $stmt->error;
    echo "Insert Failed";
}

// close the statement and connection.
$stmt->close();
$conn->close();
?>
