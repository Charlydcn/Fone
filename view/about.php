<?php

ob_start();

?>


<?php

$content = ob_get_clean();
$title = "About";
$secondTitle = "About";
$css = "";
$js = "";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>