<?php
require('../includes/config.php');
if (!isset($_GET['id']) || $_GET['id'] == '') { //if no id is passed to this page take user back to previous page
    header('Location: ' . DIRADMIN);
}
if (isset($_POST['submit'])) {

    $title = $_POST['pageTitle'];
    $content = $_POST['pageContent'];
    $pageID = $_POST['pageID'];

    $title = mysqli_real_escape_string($connection, $title);
    $content = mysqli_real_escape_string($connection, $content);

    mysqli_query($connection, "UPDATE pages SET pageTitle='$title', pageContent='$content' WHERE pageID='$pageID'");
    $_SESSION['success'] = 'Page Updated';
    header('Location: ' . DIRADMIN . "?page=pages");
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
    <h1>Edit Page</h1>
    <?php
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM pages WHERE pageID='$id'");
    $row = mysqli_fetch_assoc($q);
    ?>
    <form action="" method="post">
        <input type="hidden" name="pageID" value="<?php echo $row['pageID']; ?>" />
        <div class="form-group">
            <label for="title">Title:</label><br />
            <input id="title" class="form-control" name="pageTitle" type="text" value="<?php echo $row['pageTitle']; ?>" size="103" />
        </div>
        <div class="form-group">
            <label for="content">Content:</label><br />
            <textarea id="content" class="form-control" name="pageContent" cols="100" rows="20"><?php echo $row['pageContent']; ?></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=pages" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>