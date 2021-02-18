<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$StudioName=$_POST['StudioName'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT m.name FROM studio s, employs e, musicindustrypeople m WHERE s.studioid = e.studioid AND e.personid = m.personid AND s.name = '$StudioName'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	echo "<table align=\"center\" 
	border= \"1\">";
	echo "<tr>
	<th>Employee Name</th>
	</tr>";
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>
		<td>". $row["name"] ."</td>
		</tr>";

	}
} else {
	echo "0 results";
}
$conn->close();
?> 