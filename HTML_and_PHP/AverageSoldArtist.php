<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$AName=$_POST['AName'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT avg(AmountSold) as average FROM artists a, musicindustrypeople m, songs s WHERE a.personid = m.personid AND a.personid = s.personid AND name =  '$AName'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "Average amount sold by " . $AName . " : " . $row["average"];
	}
} else {
	echo "0 results";
}

$conn->close();
?> 