<div class="d-none d-md-flex flex-column py-1 w-100 overflow-y-auto h-100" style="direction: rtl;">
    <?php for ($i = 0; $i < 15; $i++): ?>
        <a class="message-link-component d-flex flex-row text-decoration-none py-2 ps-3 pe-2" href="#" style="direction: ltr;">
            <img src="<?php echo PICTURES_DIR."Primo/1.png"; ?>" class="message-img" alt="That image contains a background picture of a sunset with purple and orange colors.">
            <div class="message-info d-flex flex-column justify-content-center px-3 overflow-hidden w-100">
                <span class="message-username">Primo</span>
                <span class="message-last-message text-truncate">Ti va di fare un progetto assieme?</span>
            </div>
        </a>
    <?php endfor; ?>
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
            <?php for ($i = 0; $i < 10; $i++): ?>
                <a class="message-link-component d-flex flex-row text-decoration-none" href="#">
                    <img src="<?php echo PICTURES_DIR."Primo/1.png"; ?>" class="message-img" alt="That image contains a background picture of a sunset with purple and orange colors.">
                    <div class="message-info d-flex flex-column justify-content-center px-3 overflow-hidden w-100">
                        <span class="message-username">Primo</span>
                        <span class="message-last-message text-truncate">Ti va di fare un progetto assieme?</span>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>