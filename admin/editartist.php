<?php
require('../includes/config.php');
if (!isset($_GET['id']) || $_GET['id'] == '') { //if no id is passed to this page take user back to previous page
    header('Location: ' . DIRADMIN);
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];

    $first_name = mysqli_real_escape_string($connection, $first_name);
    $last_name = mysqli_real_escape_string($connection, $last_name);

    mysqli_query($connection, "UPDATE artists SET firstName='$first_name', lastname='$last_name' WHERE id='$id'");
    $_SESSION['success'] = 'Artist Updated';
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
    <h1>Edit Artist</h1>
    <?php
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM artists WHERE id='$id'");
    $row = mysqli_fetch_assoc($q);
    ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <div class="form-group">
            <label for="firstName">First Name:</label><br />
            <input name="firstName" type="text" id="firstName" value="<?php echo $row['firstName']; ?>" size="103" class="form-control" />
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label><br />
            <input name="lastName" type="text" id="lastName" value="<?php echo $row['lastName']; ?>" size="103" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=artists" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>