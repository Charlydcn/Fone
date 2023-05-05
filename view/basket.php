<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Basket";
$secondTitle = "Basket";
require 'template.php';

?>