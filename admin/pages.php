<h1>Manage Pages</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th><strong>Title</strong></th>
            <th><strong>Action</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($connection, "SELECT * FROM pages ORDER BY pageID");
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>" . $row['pageTitle'] . "</td>";
            if ($row['pageID'] == 1) { //home page hide the delete link
                echo "<td><a href=\"" . DIRADMIN . "editpage.php?id=" . $row['pageID'] . '">Edit</a></td>';
            } else {
                echo "<td><a href=\"" . DIRADMIN . "editpage.php?id=" . $row['pageID'] . '">Edit</a> | <a href="' . DIRADMIN . '?page=pages&del=' . $row['pageID'] . '">Delete</a></td>';
            }

            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<p><a href="<?php echo DIRADMIN; ?>addpage.php" class="btn btn-info">Add Page</a></p>