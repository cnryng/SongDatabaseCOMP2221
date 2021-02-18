<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$Attribute=$_POST['entries'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT COUNT(*) as numEntries FROM $Attribute";
$result = $conn->query($query);


if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "There are " . $row["numEntries"] . " " . $Attribute . " entries.";
	}
} else {
	echo "0 results";
}

$conn->close();
?> 