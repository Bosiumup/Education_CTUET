document.addEventListener("DOMContentLoaded", function () {
    var TCOpenFormAddButtons = document.getElementById("TCOpenFormAdd");
    var TCModalAdd = document.getElementById("TCMyModalAdd");
    var TCModalAddCloseButton = TCModalAdd.querySelector(".close");

    TCOpenFormAddButtons.addEventListener("click", function () {
        // Mở modal
        TCModalAdd.style.display = "flex";
    });

    TCModalAddCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        TCModalAdd.style.display = "none";
    });
});
