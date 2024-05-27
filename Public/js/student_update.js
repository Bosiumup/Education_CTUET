document.addEventListener("DOMContentLoaded", function () {
    var studentOpenFormUpdateButtons = document.querySelectorAll(
        ".StudentOpenFormUpdate"
    );
    var studentMyModal = document.getElementById("StudentMyModal");
    var studentModalCloseButton = studentMyModal.querySelector(".close");

    for (var i = 0; i < studentOpenFormUpdateButtons.length; i++) {
        studentOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var studentPresentID = row.querySelector(
                ".studentPresentID"
            ).value;
            var studentPresentName = row.querySelector(
                ".studentPresentName"
            ).value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("studentOldID").value = studentPresentID;
            document.getElementById("studentFormID").value = studentPresentID;
            document.getElementById("studentFormName").value = studentPresentName;

            // Mở modal
            studentMyModal.style.display = "flex";
        });
    }

    studentModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        studentMyModal.style.display = "none";
    });
});