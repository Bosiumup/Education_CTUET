document.addEventListener("DOMContentLoaded", function () {
    var TCOpenFormUpdateButtons =
        document.querySelectorAll(".TCOpenFormUpdate");
    var tcModal = document.getElementById("tcMyModal");
    var tcModalCloseButton = tcModal.querySelector(".close");

    for (var i = 0; i < TCOpenFormUpdateButtons.length; i++) {
        TCOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var tcPresentKhoaID = row.querySelector(".tcPresentKhoaID").value;
            var tcPresentID = row.querySelector(".tcPresentID").value;
            var tcPresentName = row.querySelector(".tcPresentName").value;
            var tcPresentEmail = row.querySelector(".tcPresentEmail").value;
            var tcPresentPhone = row.querySelector(".tcPresentPhone").value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("tcFormselectOption").value =
                tcPresentKhoaID;
            document.getElementById("tcOldID").value = tcPresentID;
            document.getElementById("tcFormName").value = tcPresentName;
            document.getElementById("tcFormEmail").value = tcPresentEmail;
            document.getElementById("tcFormPhone").value = tcPresentPhone;

            // Mở modal
            tcModal.style.display = "flex";
        });
    }

    tcModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        tcModal.style.display = "none";
    });
});
