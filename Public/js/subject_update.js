document.addEventListener("DOMContentLoaded", function () {
    var SJOpenFormUpdateButtons =
        document.querySelectorAll(".SJOpenFormUpdate");
    var SJModal = document.getElementById("SJMyModal");
    var SJModalCloseButton = SJModal.querySelector(".close");

    for (var i = 0; i < SJOpenFormUpdateButtons.length; i++) {
        SJOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var SJPresentKhoaID = row.querySelector(".SJPresentKhoaID").value;
            var SJPresentID = row.querySelector(".SJPresentID").value;
            var SJPresentName = row.querySelector(".SJPresentName").value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("SJFormselectOption").value =
                SJPresentKhoaID;
            document.getElementById("SJOldID").value = SJPresentID;
            document.getElementById("SJFormID").value = SJPresentID;
            document.getElementById("SJFormName").value = SJPresentName;

            // Mở modal
            SJModal.style.display = "flex";

        });

    }

    SJModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        SJModal.style.display = "none";
    });
});