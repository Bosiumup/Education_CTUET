document.addEventListener("DOMContentLoaded", function () {
    var EPOpenFormUpdateButtons =
        document.querySelectorAll(".EPOpenFormUpdate");
    var epModal = document.getElementById("epMyModal");
    var epModalCloseButton = epModal.querySelector(".close");

    for (var i = 0; i < EPOpenFormUpdateButtons.length; i++) {
        EPOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var EPPresentKhoaID = row.querySelector(".epPresentKhoaID").value;
            var EPPresentID = row.querySelector(".epPresentID").value;
            var EPPresentName = row.querySelector(".epPresentName").value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("epFormselectOption").value =
                EPPresentKhoaID;
            document.getElementById("epOldID").value = EPPresentID;
            document.getElementById("epFormID").value = EPPresentID;
            document.getElementById("epFormName").value = EPPresentName;

            // Mở modal
            epModal.style.display = "flex";
        });
    }

    epModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        epModal.style.display = "none";
    });
});
