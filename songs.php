<?php
if(isset($_GET['songs_id'])){
	include 'song.php';
}
else{
	include 'pages.php';
	echo '<div class="mt-5">';

	$sql = mysqli_query($connection, "SELECT * FROM songs ORDER BY id");

	while($row = mysqli_fetch_assoc($sql))
	{
	    $artist = $row['aid'];
	    $sql2 = mysqli_query($connection, "SELECT * FROM artists WHERE id='$artist'");
	    $r = mysqli_fetch_assoc($sql2);

	    echo "<h3>";
	    echo $row['songTitle'];
	    echo "</h3>";
	    echo "<p>";
	    echo '<a href="' . DIR . '?page=songs&id=' . $_GET['id'] . '&songs_id='. $row['id'].'">' . "View more</a>";
	    echo "</p>";
	}
	echo "</div>";
}
?>

