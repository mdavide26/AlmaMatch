<div class="w-100 overflow-y-auto d-flex flex-column gap-3">
    <div class="profile-pictures">
        <header>
            <span class="ps-3">Profile pictures</span>
        </header>
        <div class="pictures-container py-4 px-4 mb-2 col-12 d-flex align-items-center justify-content-center gap-2 obj">
            <img src="<?php echo PICTURES_DIR.'Primo/1.png'; ?>" alt="That image shows the first image of Primo" class="profile-picture col-4">
            <button type="button" class="profile-picture template-image-missing col-4"><i class="fi fi-br-add"></i></button>
            <button type="button" class="profile-picture template-image-missing col-4"><i class="fi fi-br-add"></i></button>
        </div>
    </div>
    <div class="profile-info px-0">
        <header class="pb-2">
            <span class="ps-3">Study Plan</span>
        </header>
        <div class="info-container">
            <div class="info-item d-flex align-items-center py-2">
                <button type="button" class="info-label w-100 d-flex align-items-center justify-content-between px-3">
                    <span class="info-text">Computer Science</span>
                    <i class="fi fi-br-angle-small-right"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="profile-info px-0">
        <header class="pb-2">
            <span class="ps-3">Searching Partners</span>
        </header>
        <div class="info-container">
            <div class="info-item d-flex align-items-center py-2">
                <button type="button" class="info-label w-100 d-flex align-items-center justify-content-between px-3">
                    <span class="info-text">Computer Science, Electronic</span>
                    <i class="fi fi-br-angle-small-right"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="profile-info px-0">
        <header class="pb-2">
            <span class="ps-3">Communication Style</span>
        </header>
        <div class="info-container">
            <div class="info-item d-flex align-items-center py-2">
                <button type="button" class="info-label w-100 d-flex align-items-center justify-content-between px-3">
                    <span class="info-text">In Real Life, Online</span>
                    <i class="fi fi-br-angle-small-right"></i>
                </button>
            </div>
        </div>
    </div>
    <a href="<?php echo PROJECT_DIR."logout"; ?>" class="btn logout-btn btn-danger w-100">Logout</a>
    <a href="#" class="btn delete-account-btn btn-danger w-100 mt-5 mb-4">Delete Account</a>
</div>

