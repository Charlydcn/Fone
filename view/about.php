<?php

ob_start();

?>


<?php

$content = ob_get_clean();
$title = "About";
$secondTitle = "About";
$css = "";
$js = "";
$basketQtt = $qtt;
require 'template.php';

?>