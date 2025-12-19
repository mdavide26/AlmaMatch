<div class="d-none d-md-flex row row-cols-md-2 row-cols-xl-3 matches-container align-items-center g-2 px-3">
    <?php foreach ($templateParams["matches"] as $match): ?>
        <div class="image-container col justify-content-center d-flex">
            <img src="<?php echo PICTURES_DIR.$match["name"]."/".$match["image_path"]; ?>" alt="<?php echo $match["alt_text"]; ?>">
        </div>
    <?php endforeach; ?>
</div>

<div class="d-md-none d-flex">
    <div class="matches-container d-flex flex-nowrap gap-3 py-2">
        <?php foreach ($templateParams["matches"] as $match): ?>
            <div class="image-container">
                <img src="<?php echo PICTURES_DIR.$match["name"]."/".$match["image_path"]; ?>" alt="<?php echo $match["alt_text"]; ?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>