<?php
require('../includes/config.php');
if (isset($_POST['submit'])) {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);

    mysqli_query($connection, "INSERT INTO artists (firstName,lastName) VALUES ('$first_name','$last_name')") or die(mysqli_error($connection));
    $_SESSION['success'] = 'Artist Added';
    header('Location: ' . DIRADMIN . "?page=artists");
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
    <h1>Add Artist</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="firstName">First Name:</label><br />
            <input name="firstName" type="text" id="firstName" value="" size="103" class="form-control" />
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label><br />
            <input name="lastName" type="text" id="lastName" value="" size="103" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=artists" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>