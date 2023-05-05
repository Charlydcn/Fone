<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "All products";
$secondTitle = "All products";
require 'template.php';

?>