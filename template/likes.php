<div class="almamatch-container">
    <div class="tabs d-flex justify-content-center align-items-center mb-3 gap-2 pb-1">
        <button type="button" class="tab-btn active" data-type="received">
            Likes Received
        </button>
        <span class="divider">|</span>
        <button type="button" class="tab-btn" data-type="sent">
            Likes Sent
        </button>
    </div>
    <div class="container">
        <div id="likes-container" class="row row-cols-2 g-3">
            <script>
                const tabs = document.querySelectorAll(".tab-btn");

                const likesData = {
                    received: [
                    ],
                    sent: [
                    ]
                };

                const container = document.getElementById("likes-container");
                const buttons = document.querySelectorAll(".tab-btn");

                function renderLikes(type) {
                    container.innerHTML = "";
                
                    likesData[type].forEach((img, index) => {
                        container.innerHTML += `
                            <div class="col">
                                <button class="btn p-0 w-100">
                                    <img class="img-fluid rounded" src="../upload/pictures/Primo/${img}" alt="">
                                </button>
                            </div>
                        `;
                    });
                }

                tabs.forEach(tab => {
                    tab.addEventListener("pointerup", function (e) {
                        e.preventDefault();
                    
                        tabs.forEach(t => t.classList.remove("active"));
                        this.classList.add("active");
                        renderLikes(this.dataset.type);
                    });
                });
            </script>
        </div>
    </div>
</div>
