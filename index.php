<?php
require_once('includes/config.php');
require_once('includes/header.php');
?>
<div class="container">
    <?php
    require('includes/nav.php');
    ?>
    <div id="content">
        <?php
        if (isset($_GET['page'])) {
            if (isset($_GET['id'])) {
                switch ($_GET['page']) {
                    case 'pages':
                        include_once 'pages.php';
                        break;
                    case 'songs':
                        include_once 'songs.php';
                        break;
                    case 'artists':
                        include_once 'artists.php';
                        break;
                    case 'genres':
                        include_once 'genres.php';
                        break;
                }
            }
        } else {
            include_once 'homepage.php';
        }
        ?>
    </div><!-- close content div -->
    <?php
    require('includes/footer.php');
    ?>