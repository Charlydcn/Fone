<?php

ob_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<div id="adminMenu">
    <h1>Enter password</h1>

    <form action="index.php?action=handleAdminPassword" method="POST" autocomplete="off">

        <input type="password" name="password" required>
        <input type="submit" name="submit" value="Enter">

    </form>
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