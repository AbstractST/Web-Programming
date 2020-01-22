<h1>Manage Songs</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Songs</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($connection, "SELECT * FROM songs ORDER BY id");
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>" . $row['songTitle'] . "</td>";
            echo "<td><a href=\"" . DIRADMIN . "editsong.php?id=" . $row['id'] . '">Edit</a> | <a href="' . DIRADMIN . '?page=songs&del=' . $row['id'] . '">Delete</a></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN; ?>addsong.php" class="btn btn-info">Add Song</a></p>