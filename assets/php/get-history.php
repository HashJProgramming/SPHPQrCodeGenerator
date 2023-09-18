<?php
function get_images(){
    $images = glob("assets/img/*.png");
    foreach ($images as $image) {
        $filePath = basename($image);
        ?>
            <div class="col">
                <img class="img-fluid rounded mx-auto d-block mb-3" src="<?php echo $image; ?>" width="30%" alt="QR-Code">
                <a type="button" href="<?php echo $image; ?>" class="btn btn-dark mx-auto">Download</a>
                <a type="button" href="assets/php/delete-image.php?filename=<?php echo $filePath; ?>" class="btn btn-danger mx-auto">Delete</a>
            </div>  
        <?php
    }
}