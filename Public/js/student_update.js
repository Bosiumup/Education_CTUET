document.addEventListener("DOMContentLoaded", function () {
    var SDOpenFormUpdateButtons =
        document.querySelectorAll(".SDOpenFormUpdate");
    var sdModal = document.getElementById("sdMyModal");
    var sdModalCloseButton = sdModal.querySelector(".close");

    for (var i = 0; i < SDOpenFormUpdateButtons.length; i++) {
        SDOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var sdPresentEPID = row.querySelector(".sdPresentEPID").value;
            var sdPresentID = row.querySelector(".sdPresentID").value;
            var sdPresentName = row.querySelector(".sdPresentName").value;
            var sdPresentEmail = row.querySelector(".sdPresentEmail").value;
            var sdPresentPhone = row.querySelector(".sdPresentPhone").value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("sdFormselectOption").value = sdPresentEPID;
            document.getElementById("sdOldID").value = sdPresentID;
            document.getElementById("sdFormName").value = sdPresentName;
            document.getElementById("sdOldEmail").value = sdPresentEmail;
            document.getElementById("sdFormPhone").value = sdPresentPhone;

            // Mở modal
            sdModal.style.display = "flex";
        });
    }

    sdModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        sdModal.style.display = "none";
    });
});
