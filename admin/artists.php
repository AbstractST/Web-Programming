<h1>Manage Artists</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Artists</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($connection, "SELECT * FROM artists ORDER BY id");
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
            echo "<td><a href=\"" . DIRADMIN . "editartist.php?id=" . $row['id'] . '">Edit</a> | <a href="' . DIRADMIN . '?page=artists&del=' . $row['id'] . '">Delete</a></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN; ?>addartist.php" class="btn btn-info">Add Artist</a></p>