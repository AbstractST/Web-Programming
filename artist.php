<div></div>
<?php
$id = $_GET['id'];
$sql = mysqli_query($connection, "SELECT * FROM artists WHERE id='{$id}'");

$row = mysqli_fetch_assoc($sql);
if (!empty($row)) {
    echo "<h2>";
    echo "All songs by artist: ";
    echo $row['firstName'] . " " . $row['lastName'];
    echo "</h2>";
} else {
    include 'pages.php';
    $sql = mysqli_query($connection, "SELECT * FROM artists ORDER BY id");
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '<a href="' . DIR . '?page=artists&id=' . $_GET['id'] . "&id=" . $row['id'] . '">' . $row['firstName'] . " " . $row['lastName'] . "</a><br>";
    }
}
echo '<div class="mt-5">';
$sql = mysqli_query($connection, "SELECT songTitle FROM songs WHERE aid='{$id}'");
while ($row = mysqli_fetch_assoc($sql)) {
    echo "<h4>";
    echo $row['songTitle'];
    echo "</h4>";
}
echo '</div>';

?>