<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$Attribute=$_POST['artist'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT name, $Attribute FROM Artists a, MusicIndustryPeople m WHERE m.personid = a.personid";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	echo "<table align=\"center\" 
	border= \"1\">";
	echo "<tr>
	<th>Name</th>
	<th>$Attribute</th>
	</tr>";
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>
		<td>". $row["name"] ."</td>
		<td>". $row["$Attribute"] ."</td>
		</tr>";

	}
} else {
	echo "0 results";
}

$conn->close();
?> 