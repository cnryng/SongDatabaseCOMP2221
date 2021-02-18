<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$AmountSold=$_POST['Amount_Sold'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT m.name, sum(amountsold) as totalSold FROM artists a, musicindustrypeople m, songs s1 WHERE a.personid = m.personid AND 
			a.personid = s1.personid GROUP BY m.name HAVING sum(amountsold) > $AmountSold ORDER BY totalSold";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	echo "<table align=\"center\" 
	border= \"1\">";
	echo "<tr>
	<th>name</th>
	<th>Total Amount Sold</th>
	</tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td>". $row["name"] ."</td>
		<td>". $row["totalSold"] ."</td>
		</tr>";
	}
} else {
	echo "0 results";
}

$conn->close();
?> 