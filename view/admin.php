<?php

ob_start();

?>

<div id="adminMenu">
    <h1>Administrator menu</h1>
    <div>
        <a href="index.php?action=dashboardCreate">Create product</a>
        <a href="index.php?action=dashboardEditChoose">Edit product</a>
    </div>
</div>


<?php

$content = ob_get_clean();
$title = "Admin";
$secondTitle = "Admin";
$css = "admin.css";
require 'template.php';

?>