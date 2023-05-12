<?php

ob_start();

?>


<form action="index.php?action=createProduct" method="POST" enctype="multipart/from-data" autocomplete="off">
    <fieldset>

        <legend>
            <h1>Create a product</h1>
        </legend>
        <div>
            <label>
                Product name :
                <input type="text" name="name" required>
            </label>
        
            <label>
                Price :
                <input type="number" name="price" step="0.5" min="0" required>
            </label>

            <label>
                Category : 
                <select name="category" required>
                    <option value="" disabled selected>--Select--</option>
            
                    <?php
                    foreach($categories as $category) {
                    ?>
            
                    <option value="<?=$category['id_category']?>" name="category">
                        <?=ucfirst($category['name'])?>
                    </option>
            
                    <?php } ?>
            
                </select>
            </label>
        
            <label>
                Reduction :
                <input type="number" name="sale" step="5" min="0" max="100">
            </label>
        
            <label>
                Description :
                <textarea name="description" cols="20" rows="5" required></textarea>
            </label>
        
            <label>
                Image :
                <input type="file" name="img">
            </label>
    
            <input type="submit" name="submit" value="Create product">
    
        </div>
    </fieldset>
</form>

<?php

$content = ob_get_clean();
$title = "Creation";
$secondTitle = "Creation";
$css = "admin.css";
$js = "";
require 'template.php';

?>