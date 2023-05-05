<?php

ob_start();

?>


<div>
    <div>
        <h1>Find what's best for you</h1>

        <a href="index.php?action=home">SHOP NOW</a>
    </div>

    <figure>
        <img src="public/img/homepage.jpg" alt="phone saying Hello" id="homepage_img">
    </figure>

</div>

<?php

$content = ob_get_clean();
$title = "Home";
$secondTitle = "Home";
$css = "home.css";
require 'template.php';

?>