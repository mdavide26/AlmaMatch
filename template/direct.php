<?php
    $directInfos = $templateParams["direct-info"];

    $userInfo = $directInfos[0];
    $profileImage = $directInfos[0];
?>
<div class="direct-container d-flex flex-column vh-100">
    <header class="w-100 d-flex align-items-center px-3 direct-header my-2">
        <div class="profile-image-container">
            <img
                src="<?php echo PICTURES_DIR.$profileImage["user_id"].$profileImage["image_path"]; ?>"
                class="profile-image"
                alt="<?php echo $profileImage["alt_text"]; ?>"
            >
        </div>
        <span class="text-center align-items-center d-flex px-3">
            <?php echo "You matched with $userInfo[name] $userInfo[surname]"; ?>
        </span>
        <div class="image-container ms-auto d-flex align-items-center mx-3">
            <a href="<?php echo PROJECT_DIR . "/messages/"; ?>" class="text-decoration-none">
                <i class="fi fi-rr-cross fs-6"></i>
            </a>
        </div>
    </header>
</div>
