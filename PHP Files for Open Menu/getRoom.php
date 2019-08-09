<?php
$servername = $_POST['databaseURL'];
$username = $_POST['username'];
$password = $_POST['password'];
$db = $_POST['db'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db)
    or die ("unable to connect ".mysqli_connect_error());

// MySQL query
$sql="SELECT hallway.hallName, room.roomID, room.occupied, room.fName,room.lName,room.foodDiet, room.liquidDiet,room.otherNotes FROM hallway INNER JOIN room ON hallway.hallID=room.hallID";

// query to database
$query=@mysqli_query($conn, $sql);

// if connection worked display all values
while($room=mysqli_fetch_array($query)){
      echo $room['hallName'].",".$room['roomID'].","
      .$room['occupied'].",".$room['fName'].",".$room['lName']
      .",".$room['foodDiet'].",".$room['liquidDiet'].",".$room['otherNotes'];
        echo "/";
}
?>
