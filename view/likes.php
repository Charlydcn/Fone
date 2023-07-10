<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Favorites";
$secondTitle = "Favorites";
$basketQtt = $qtt;
require 'template.php';

?>