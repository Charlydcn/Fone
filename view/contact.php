<?php

ob_start();

?>


<?php

$content = ob_get_clean();
$title = "Contact";
$secondTitle = "Contact";
$css = "";
$js = "";
if (isset($qtt) && $qtt != null) {
    $basketQtt = $qtt;
} else {
    $qtt = 0;
}
require 'template.php';

?>