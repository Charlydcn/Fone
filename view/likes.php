<?php

ob_start();

?>

<?php

$content = ob_get_clean();
$title = "Favorites";
$secondTitle = "Favorites";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>