<?php
require('../includes/config.php');
if (!isset($_GET['id']) || $_GET['id'] == '') { //if no id is passed to this page take user back to previous page
    header('Location: ' . DIRADMIN);
}
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['genreTitle'];

    $id = mysqli_real_escape_string($connection, $id);
    $name = mysqli_real_escape_string($connection, $name);

    mysqli_query($connection, "UPDATE genres SET genreTitle='$name' WHERE id='$id'");
    $_SESSION['success'] = 'Genre Updated';
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
    <h1>Edit Genre</h1>
    <?php
    $values = editGenreValues($_GET['id']);
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name:</label><br />
            <input class="form-control" name="genreTitle" type="text" id="name" value="<?php echo $values[0]; ?>" size="103" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=genres" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>