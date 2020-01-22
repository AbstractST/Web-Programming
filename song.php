<?php

$songid = $_GET['songs_id'];
$sql = mysqli_query($connection, "SELECT * FROM songs WHERE id='{$songid}'");

$row = mysqli_fetch_assoc($sql);

if (!empty($row)) {

    $artist = $row['aid'];
    $genreID = $row['genre'];
    $length = $row['length'];

    $sql2 = mysqli_query($connection, "SELECT * FROM artists WHERE id='$artist'");
    $r = mysqli_fetch_assoc($sql2);

    $sq23 = mysqli_query($connection, "SELECT * FROM genres WHERE id='$genreID'");
    $r23 = mysqli_fetch_assoc($sq23);

    $sqsongs = mysqli_query($connection, "SELECT * FROM songs WHERE length='$length'");
    $rmsongs = mysqli_fetch_assoc($sqsongs);


    echo "<h1>" . $row['songTitle'] . "</h1>";
    echo "<br>";
    echo "<b>Artist:</b> " . $r['firstName'] . " " . $r['lastName'];
    echo "<br>";
    echo "<b>Released Date:</b> " . date('F d, Y', strtotime($row['released']));
    echo "<br>";
    echo "<b>" . "Length: " . "</b>" . $rmsongs['length'];
    echo "<br>";
    echo "<b>Genre:</b> " . $r23['genreTitle'];
    echo "<br>";
    echo "<b>Lyrics:</b> " . $row['songLyrics'];

} else {

    //if we want to redirect to authors page
    header("Location:" . DIR . '?page=songs&id=' . $_GET['id']);
}

?>

<br>
<a href="<?php echo DIR . '?page=songs&id=' . $_GET['id']; ?>">Back to Songs</a>