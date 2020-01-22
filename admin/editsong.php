<?php

require('../includes/config.php');

if (!isset($_GET['id']) || $_GET['id'] == '') { //if no id is passed to this page take user back to previous page
    header('Location: ' . DIRADMIN);
}

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $songTitle = $_POST['songTitle'];
    $songLyrics = $_POST['songLyrics'];
    $artist = $_POST['artist'];
    $released = $_POST['released'];
    $length = $_POST['length'];
    $genre = $_POST['genre'];

    $songTitle = mysqli_real_escape_string($connection, $songTitle);
    $songLyrics = mysqli_real_escape_string($connection, $songLyrics);
    $released = mysqli_real_escape_string($connection, $released);
    $artist = mysqli_real_escape_string($connection, $artist);
    $length = mysqli_real_escape_string($connection, $length);
    $genre = mysqli_real_escape_string($connection, $genre);

    mysqli_query($connection, "UPDATE songs SET songTitle='$songTitle', songLyrics='$songLyrics', aid='$artist', released='$released', length='$length', genre='$genre' WHERE id='$id'");
    $_SESSION['success'] = 'Song Updated';
    header('Location: ' . DIRADMIN . "?page=songs");
    exit();
}

?>
<?php
require('includes/header.php');
?>

<div class="container">
    <?php
    require('includes/menu.php');
    ?>
    <h1>Edit Songs </h1>
    <?php
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM songs WHERE id='$id'");
    $row = mysqli_fetch_assoc($q);

    $songLyrics = $row['songLyrics'];
    $artist = $row['aid'];
    $date = date('Y-m-d', strtotime($row['released']));
    $length = $row['length'];
    $genre = $row['genre'];
    ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <!-- song title -->
        <div class="form-group">
            <label for="songTitle">Song Title:</label><br />
            <input class="form-control" name="songTitle" type="text" id="songTitle" value="<?php echo $row['songTitle']; ?>" size="103" />
        </div>
        <!-- song title -->
        <!-- song lyrics-->
        <div class="form-group">
            <label for="songLyrics">Song Lyrics:</label><br />
            <input class="form-control" name="songLyrics" type="text" id="songLyrics" value="<?php echo $row['songLyrics']; ?>" size="103" />
        </div>
        <!-- song lyrics -->
        <!-- artist -->
        <div class="form-group">
            <label for="artist">Artist:</label><br />
            <select id="artist" name="artist" class="browser-default custom-select form-control" required>
                <option disabled>Select Artist</option>
                <?php
                $sql = mysqli_query($connection, "SELECT * FROM artists ORDER BY id");
                while ($row = mysqli_fetch_assoc($sql)) {
                    if ($artist == $row['id']) {
                        echo '<option selected value="' . $row['id'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
                    } else {
                        echo '<option value="' . $row['id'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <!-- artist -->
        <!-- released -->
        <div class="form-group">
            <label for="released">Released:</label>
            <input type="released" id="date" class="form-control" name="released" value="<?php echo $date; ?>">
        </div>
        <!-- released -->
        <!-- length -->
        <div class="form-group">
            <label for="length">Length:</label><br />
            <input class="form-control" name="length" type="text" id="length" value="<?php echo $length; ?>" size="103" />
        </div>
        <!-- length -->
        <!-- genre -->
        <div class="form-group">
            <label for="genre">Genre:</label><br />
            <select id="genre" name="genre" class="browser-default custom-select form-control" required>
                <option disabled>Select Genre</option>
                <?php
                $sql = mysqli_query($connection, "SELECT * FROM genres ORDER BY id");
                while ($row = mysqli_fetch_assoc($sql)) {
                    if ($genre == $row['id']) {
                        echo '<option selected value="' . $row['id'] . '">' . $row['genreTitle'] . '</option>';
                    } else {
                        echo '<option value="' . $row['id'] . '">' . $row['genreTitle'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <!-- genre -->
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=songs" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>