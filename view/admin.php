<?php

ob_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

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
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>