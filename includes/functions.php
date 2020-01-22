<?php

require_once('connection.php');

if (!defined('included')) {
    die('You cannot access this file directly!');
}

//log user in ---------------------------------------------------
function login($user, $pass)
{

    require('connection.php');

    //strip all tags from varible   
    $user = strip_tags(mysqli_real_escape_string($connection, $user));
    $pass = strip_tags(mysqli_real_escape_string($connection, $pass));

    $pass = md5($pass);

    // check if the user id and password combination exist in database
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($connection, $sql) or die('Query failed. ' . mysqli_error($connection));

    if (mysqli_num_rows($result) == 1) {
        // the username and password match,
        // set the session
        $_SESSION['authorized'] = true;
        $_SESSION['success'] = 'You are logged in!';

        // direct to admin
        header('Location: ' . DIRADMIN);
        exit();
    } else {
        // define an error message
        $_SESSION['error'] = 'Sorry, wrong username or password';
    }
}

// Authentication
function logged_in()
{
    if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == true) {
        return true;
    } else {
        return false;
    }
}

function login_required()
{
    if (logged_in()) {
        return true;
    } else {
        header('Location: ' . DIRADMIN . 'login.php');
        exit();
    }
}

function logout()
{
    unset($_SESSION['authorized']);
    header('Location: ' . DIRADMIN . 'login.php');
    exit();
}

// Render error messages
function messages()
{
    $message = '';
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        $message = '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        $_SESSION['success'] = '';
    }
    if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
        $message = '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

function errors($error)
{
    if (!empty($error)) {
        $i = 0;
        while ($i < count($error)) {
            $showError .= "<div class=\"msg-error\">" . $error[$i] . "</div>";
            $i++;
        }
        echo $showError;
    } // close if empty errors
} // close function

function deletePage($page_id)
{
    require('connection.php');

    $delpage = mysqli_real_escape_string($connection, $page_id);
    $sql = mysqli_query($connection, "DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted";
    return '?page=pages';
}

// delete director
function deleteArtist($id)
{
    require('connection.php');

    $delpage = mysqli_real_escape_string($connection, $id);
    $sql = mysqli_query($connection, "DELETE FROM artists WHERE id = '$delpage'");
    $_SESSION['success'] = "Artist Deleted";
    return '?page=artists';
}

// delete Movies
function deleteSong($id)
{
    require('connection.php');

    $delpage = mysqli_real_escape_string($connection, $id);
    $sql = mysqli_query($connection, "DELETE FROM songs WHERE id = '$delpage'");
    $_SESSION['success'] = "Song Deleted";
    return '?page=songs';
}

// delete Genre
function deleteGenre($id)
{
    require('connection.php');

    $delpage = mysqli_real_escape_string($connection, $id);
    $sql = mysqli_query($connection, "DELETE FROM genres WHERE id = '$delpage'");
    $_SESSION['success'] = "Genre Deleted";
    return '?page=genres';
}

// edit genres
function editGenreValues($id)
{
    require('connection.php');
    $id = mysqli_real_escape_string($connection, $id);
    $q = mysqli_query($connection, "SELECT * FROM genres WHERE id='$id'");
    $row = mysqli_fetch_assoc($q);
    $name = $row['genreTitle'];

    return array($name);
}

?>