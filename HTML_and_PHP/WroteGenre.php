<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$Genre=$_POST['genre'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
if ($Genre == "ALL") {
	$query = "SELECT m.name FROM musicindustrypeople m WHERE NOT EXISTS (SELECT * FROM songs s1 WHERE NOT EXISTS 
	(SELECT DISTINCT s2.genre FROM songs s2 WHERE s1.genre = s2.genre AND m.personid = s2.personid))";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		echo "<table align=\"center\" 
		border= \"1\">";
		echo "<tr>
		<th>MIP Name</th>
		</tr>";
		while($row = $result->fetch_assoc()) {
			
			echo "<tr>
			<td>". $row["name"] ."</td>
			</tr>";

		}
	} else {
		echo "0 results";
	}
}
else {
	$query = "SELECT DISTINCT m.name FROM musicindustrypeople m, songs s WHERE m.personid = s.personid AND s.genre = '$Genre'";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		echo "<table align=\"center\" 
		border= \"1\">";
		echo "<tr>
		<th>MIP Name</th>
		</tr>";
		while($row = $result->fetch_assoc()) {
			
			echo "<tr>
			<td>". $row["name"] ."</td>
			</tr>";

		}
	} else {
		echo "0 results";
	}
	
}
$conn->close();
?> 