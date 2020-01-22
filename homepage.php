<?php
$q = mysqli_query($connection,"SELECT * FROM pages WHERE pageID='1'");
$r = mysqli_fetch_assoc($q);

echo "<h1>".$r['pageTitle']."</h2>";
echo $r['pageContent'];
?>