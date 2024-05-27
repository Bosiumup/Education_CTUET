document.addEventListener("DOMContentLoaded", function () {
    var SJOpenFormAddButtons = document.getElementById("SJOpenFormAdd");
    var SJModalAdd = document.getElementById("SJMyModalAdd");
    var SJModalAddCloseButton = SJModalAdd.querySelector(".close");

    SJOpenFormAddButtons.addEventListener("click", function () {
        // Mở modal
        SJModalAdd.style.display = "flex";
    });

    SJModalAddCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        SJModalAdd.style.display = "none";
    });
});
