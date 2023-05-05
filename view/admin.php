<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Admin";
$secondTitle = "Admin";
require 'template.php';

?>