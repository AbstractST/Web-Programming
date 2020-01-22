<h1>Manage Genres</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Genre name</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($connection, "SELECT * FROM genres ORDER BY id");
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>" . $row['genreTitle'] . "</td>";
            echo "<td><a href=\"" . DIRADMIN . "editgenre.php?id=" . $row['id'] . '">Edit</a> | <a href="' . DIRADMIN . '?page=genres&del=' . $row['id'] . '">Delete</a></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN; ?>addgenre.php" class="btn btn-info">Add Genre</a></p>