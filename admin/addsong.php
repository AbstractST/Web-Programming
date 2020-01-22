<?php
require('../includes/config.php');

if (isset($_POST['submit'])) {
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

    mysqli_query($connection, "INSERT INTO songs (songTitle,songLyrics,aid,released,length,genre) VALUES ('$songTitle','$songLyrics','$artist','$released','$length','$genre')") or die(mysqli_error($connection));
    $_SESSION['success'] = 'Song Added';
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
    <h1>Add Song </h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="songTitle">Song Title:</label><br />
            <input class="form-control" name="songTitle" type="text" id="songTitle" value="" size="103" />
        </div>
        <div class="form-group">
            <label for="songLyrics">Song Lyrics:</label><br />
            <input class="form-control" name="songLyrics" type="text" id="songLyrics" value="" size="103" />
        </div>
        <div class="form-group">
            <label for="artist">Artist:</label><br />
            <select id="artist" name="artist" class="browser-default custom-select form-control" required>
                <option selected disabled>Select artist</option>
                <?php
                $sql = mysqli_query($connection, "SELECT * FROM artists ORDER BY id");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '<option value="' . $row['id'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
                }
                ?>
            </select>
        </div>
        <!-- Released -->
        <div class="form-group">
            <label for="released">Released:</label>
            <input type="date" id="released" class="form-control" name="released">
        </div>
        <!-- Released -->
        <!-- length -->
        <div class="form-group">
            <label for="length">Length:</label><br />
            <input class="form-control" name="length" type="text" id="length" value="" size="103" />
        </div>
        <!-- length -->
        <!-- genre -->
        <div class="form-group">
            <label for="genre">Genre:</label><br />
            <select id="genre" name="genre" class="browser-default custom-select form-control" required>
                <option selected disabled>Select Genre</option>
                <?php
                $sql = mysqli_query($connection, "SELECT * FROM genres ORDER BY id");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '<option value="' . $row['id'] . '">' . $row['genreTitle'] . '</option>';
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