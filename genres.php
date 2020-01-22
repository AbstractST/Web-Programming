<?php
if(isset($_GET['genre_id'])){
	include 'genre.php';
}
else{
	include 'pages.php';
	echo '<div class="mt-5">';
	$sql = mysqli_query($connection, "SELECT * FROM genres ORDER BY id");

	while($row = mysqli_fetch_assoc($sql))
	{	
		echo "<h3>";
		echo '<a href="' . DIR . '?page=genres&id='. $_GET['id'] . "&genre_id=". $row['id'] . '">' . $row['genreTitle'] . "</a><br>";
		echo "</h3>";
	}
	echo "</div>";
}
?>