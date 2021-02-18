<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$database = "Song Database"; 

$SName=$_POST['SName'];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT genre, duration, songname, releasedate, amountsold, albumname FROM songs WHERE SongName = '$SName'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	echo "<table align=\"center\" 
	border= \"1\">";
	echo "<tr>
	<th>SongName</th>
	<th>AlbumName</th>
	<th>Genre</th>
	<th>Duration</th>
	<th>ReleaseDate</th>
	<th>AmountSold</th>
	</tr>";
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>
		<td>". $row["songname"] ."</td>
		<td>". $row["albumname"] ."</td>
		<td>". $row["genre"] ."</td>
		<td>". $row["duration"] ."</td>
		<td>". $row["releasedate"] ."</td>
		<td>". $row["amountsold"] ."</td>
		</tr>";

	}
} else {
	echo "0 results";
}
$conn->close();
?> 