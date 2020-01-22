<?php
if(isset($_GET['id'])){
	include 'artist.php';
}
else{
	include 'pages.php';
	echo '<div class="mt-5">';
	$sql = mysqli_query($connection, "SELECT * FROM artists ORDER BY id");
	while($row = mysqli_fetch_assoc($sql))
	{	
		echo "<h3>";
		echo '<a href="' . DIR . '?page=artists&id='. $_GET['id'] . "&id=". $row['id'] . '">' . $row['firstName'] . " " . $row['lastName'] . "</a>";
		echo "</h3>";
	}
	echo "</div>";
}
?>