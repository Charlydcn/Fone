<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Sales";
$secondTitle = "Sales";
require 'template.php';

?>