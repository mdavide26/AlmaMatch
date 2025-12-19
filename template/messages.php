<div class="d-none d-md-flex flex-column py-1 w-100 overflow-y-auto h-100" style="direction: rtl;">
    <?php foreach ($templateParams["chats"] as $chat): ?>
        <a class="message-link-component d-flex flex-row text-decoration-none py-2 ps-3 pe-2" href="#" style="direction: ltr;">
            <img src="<?php echo PICTURES_DIR.$chat["other_user_name"].$chat["other_user_image"]; ?>" class="message-img" alt="<?php echo $chat["other_user_image_alt"]; ?>">
            <div class="message-info d-flex flex-column justify-content-center px-3 overflow-hidden w-100">
                <span class="message-username"><?php echo $chat["other_user_name"]; ?></span>
                <span class="message-last-message text-truncate"><?php echo ($chat["last_sender"] === "YOU" ? "You: " : "").$chat["last_message"]; ?></span>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<div class="d-flex d-md-none flex-column px-2">
    <header class="matches-container">
        <span class="px-1">Matches</span>
        <div class="overflow-x-auto px-2 pb-2" role="matches-links">
            <?php require("matches.php"); ?>
        </div>
    </header>
    <div class="messages-container mt-3">
        <span class="px-1">Messages</span>
        <div class="overflow-y-auto px-2 py-3 d-flex flex-column gap-3 justify-content-center" role="messages-links">
            <?php foreach ($templateParams["chats"] as $chat): ?>
                <a class="message-link-component d-flex flex-row text-decoration-none" href="#">
                    <img src="<?php echo PICTURES_DIR.$chat["other_user_name"].$chat["other_user_image"]; ?>" class="message-img" alt="<?php echo $chat["other_user_image_alt"]; ?>">
                    <div class="message-info d-flex flex-column justify-content-center px-3 overflow-hidden w-100">
                        <span class="message-username"><?php echo $chat["other_user_name"]; ?></span>
                        <span class="message-last-message text-truncate"><?php echo ($chat["last_sender"] === "YOU" ? "You: " : "").$chat["last_message"]; ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>