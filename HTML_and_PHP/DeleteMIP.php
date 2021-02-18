<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$PID=$_POST['PID'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "DELETE FROM MusicIndustryPeople WHERE personid = $PID";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?> 