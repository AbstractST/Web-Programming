<?php
require('../includes/config.php');
login_required();
if (isset($_GET['logout'])) {
    logout();
}
//run if a page deletion has been requested
if (isset($_GET['del'])) {

    $delpage = $_GET['del'];
    $redirect_url = '';

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'pages':
                $redirect_url = deletePage($delpage);
                break;
            case 'songs':
                $redirect_url = deleteSong($delpage);
                break;
            case 'artists':
                $redirect_url = deleteArtist($delpage);
                break;
            case 'genres':
                $redirect_url = deleteGenre($delpage);
                break;
        }
    }

    header('Location: ' . DIRADMIN . $redirect_url);
    exit();
}
?>
<?php
require('includes/header.php');
?>
<?php
//show any messages if there are any.
messages();
?>
<div class="container">
    <?php
    require('includes/menu.php');
    ?>
    <?php
    if (empty($_GET) || $_GET['page'] == 'welcome') {
        include 'welcome.php';
    } else {
        include $_GET['page'] . '.php';
    }
    ?>
    <?php
    require('includes/footer.php');
    ?>