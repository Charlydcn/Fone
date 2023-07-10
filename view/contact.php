<?php

ob_start();

?>


<?php

$content = ob_get_clean();
$title = "Contact";
$secondTitle = "Contact";
$css = "";
$js = "";
$basketQtt = $qtt;
require 'template.php';

?>