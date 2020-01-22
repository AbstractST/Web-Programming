<?php
require('../includes/config.php');
if (isset($_POST['submit'])) {
    $title = $_POST['pageTitle'];
    $content = $_POST['pageContent'];
    $title = mysqli_real_escape_string($connection, $title);
    $content = mysqli_real_escape_string($connection, $content);

    mysqli_query($connection, "INSERT INTO pages (pageTitle,pageContent) VALUES ('$title','$content')") or die(mysqli_error($connection));
    $_SESSION['success'] = 'Page Added';
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
    <h1>Add Page</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="title">Title:</label><br />
            <input name="pageTitle" class="form-control" type="text" id="title" value="" size="103" />
        </div>
        <div class="form-group">
            <label for="content">Content:</label><br />
            <textarea id="content" class="form-control" name="pageContent" cols="100" rows="20"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" />
        <a href="<?php echo DIRADMIN; ?>?page=pages" class="btn btn-danger">Cancel</a>
    </form>
</div>
<?php
require('includes/footer.php');
?>