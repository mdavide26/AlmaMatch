<div class="w-100 overflow-y-auto d-flex flex-column gap-3">
    <div class="profile-pictures">
        <header>
            <span class="ps-3">Profile pictures</span>
        </header>
        <div class="pictures-container py-4 px-4 mb-2 col-12 d-flex align-items-center justify-content-center gap-2">
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
            <div class="info-item d-flex align-items-center py-2 position-relative">
                <select class="info-label w-100 d-flex align-items-center justify-content-between px-3">
                    <option value="computer-science">Computer Science</option>
                    <option value="biology">Biology</option>
                    <option value="electronic">Electronic</option>
                    <option value="mechanical-engineering">Mechanic</option>
                </select>
                <i class="fi fi-br-angle-small-right position-absolute end-0 pe-3 user-select-none pe-none"></i>
            </div>
        </div>
    </div>
    <div class="profile-info px-0">
        <header class="pb-2">
            <span class="ps-3">Searching Partners</span>
        </header>
        <div class="info-container">
            <div class="info-item d-flex align-items-center py-2 position-relative">
                <button type="button" id="partner-select-btn" class="info-label w-100 d-flex align-items-center justify-content-between px-3" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <span id="partner-select-text" class="info-text text-truncate">Select...</span>
                </button>
                <i class="fi fi-br-angle-small-right position-absolute end-0 pe-3 user-select-none pe-none"></i>
                <ul class="dropdown-menu w-100" aria-labelledby="partner-select-btn">
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="Computer Science">Computer Science</label></li>
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="Biology">Biology</label></li>
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="Electronic">Electronic</label></li>
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="Mechanic">Mechanic</label></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="profile-info px-0">
        <header class="pb-2">
            <span class="ps-3">Communication Style</span>
        </header>
        <div class="info-container">
            <div class="info-item d-flex align-items-center py-2 position-relative">
                <button type="button" id="comm-style-select-btn" class="info-label w-100 d-flex align-items-center justify-content-between px-3" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <span id="comm-style-select-text" class="info-text text-truncate">Select...</span>
                </button>
                <i class="fi fi-br-angle-small-right position-absolute end-0 pe-3 user-select-none pe-none"></i>
                <ul class="dropdown-menu w-100" aria-labelledby="comm-style-select-btn">
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="In Real Life">In Real Life</label></li>
                    <li><label class="dropdown-item"><input type="checkbox" class="form-check-input me-2" value="Online">Online</label></li>
                </ul>
            </div>
        </div>
    </div>
    <a href="<?php echo PROJECT_DIR."logout"; ?>" class="btn logout-btn btn-danger w-100">Logout</a>
    <a href="#" class="btn delete-account-btn btn-danger w-100 mt-5 mb-4">Delete Account</a>
</div>

