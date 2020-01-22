<?php
require('../includes/config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['genreTitle'];
    $name = mysqli_real_escape_string($connection, $name);

    mysqli_query($connection, "INSERT INTO genres (genreTitle) VALUES ('$name')") or die(mysqli_error($connection));
    $_SESSION['success'] = 'Genre Added';
    header('Location: ' . DIRADMIN . "?page=genres");
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
    <h1>Add Genre</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Genre:</label><br />
            <input class="form-control" name="genreTitle" type="text" id="name" value="" size="103" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=genres" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>