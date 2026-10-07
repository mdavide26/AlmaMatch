<?php
    $directInfos = $templateParams["direct-info"];

    $userInfo = $directInfos[0];
    $profileImage = $directInfos[0];
?>
<div class="d-flex flex-row vh-100">
    <div class="direct-container d-flex flex-column vh-100 col-12 col-md-12 col-lg-8">
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
            <div class="image-container ms-auto d-flex align-items-center mx-3 gap-2">
                <button class="btn d-flex align-items-center justify-content-center">
                    <i class="fi fi-bs-menu-dots"></i>
                </button>
                <a href="<?php echo PROJECT_DIR."/messages/"; ?>" class="text-decoration-none">
                    <i class="fi fi-br-cross-circle fs-2"></i>
                </a>
            </div>
        </header>
        <div class="direct-messages-container d-flex flex-column px-3 py-2 overflow-y-auto" style="flex-grow: 1;">
            <?php foreach ($templateParams["direct-messages"] as $message): ?>
                <div class="message-row <?php echo ((int) $message["sender_id"] === (int) $_SESSION["user_id"])
                    ? "sent-message"
                    : "received-message"; ?> mb-2">

                    <div class="message-container">
                        <span class="message-content"><?php echo $message["content"]; ?></span>
                    </div>

                    <span class="message-date">
                        <span><?php echo date("d/m/Y", strtotime($message["sent_at"])); ?></span>
                        <span><?php echo date("H:i", strtotime($message["sent_at"])); ?></span>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
        <form class="direct-input-container d-flex align-items-center px-3 py-2" method="POST" action="<?php echo PROJECT_DIR."messages/send.php"; ?>">
            <input type="hidden" name="receiver_id" value="<?php echo $userInfo["user_id"]; ?>">
            <input type="text" name="message_content" class="form-control me-2" placeholder="Type your message..." required>
            <button type="submit" class="btn btn-primary"><i class="fi fi-bs-paper-plane"></i></button>
        </form>
    </div>

    <div class="direct-info-container d-flex flex-column vh-100 col-lg-4" style="background-color: #4e2f0d;">
        <!-- TODO: Aggiungere le informazioni dell'utente con cui si è matchato, come la sua bio, interessi, ecc. -->
    </div>
</div>
