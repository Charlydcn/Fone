<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Favorites";
$secondTitle = "Favorites";
require 'template.php';

?>