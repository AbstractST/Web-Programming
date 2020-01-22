<div></div>
<?php
$genreid = $_GET['genre_id'];
$sql = mysqli_query($connection, "SELECT * FROM genres WHERE id='{$genreid}'");

$row = mysqli_fetch_assoc($sql);
if (!empty($row)) {
	echo "<h2>";
	echo "All songs by genre: " . $row['genreTitle'];
	echo "</h2>";
} else {
	include 'pages.php';
	$sql = mysqli_query($connection, "SELECT * FROM genres ORDER BY id");

	while ($row = mysqli_fetch_assoc($sql)) {
		echo '<a href="' . DIR . '?page=genres&id=' . $_GET['id'] . "&genre_id=" . $row['id'] . '">' . $row['genreTitle'] . "</a><br>";
	}
}
echo '<div class="mt-5">';
$sql = mysqli_query($connection, "SELECT songTitle FROM songs WHERE genre='{$genreid}'");
while ($row = mysqli_fetch_assoc($sql)) {
	echo "<h4>";
	echo $row['songTitle'];
	echo "</h4>";
}
echo '</div>';
?>