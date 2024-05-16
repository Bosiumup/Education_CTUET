document.addEventListener("DOMContentLoaded", function () {
    var facultyOpenFormUpdateButtons = document.querySelectorAll(
        ".facultyOpenFormUpdate"
    );
    var facultyModal = document.getElementById("facultyMyModal");
    var facultyModalCloseButton = facultyModal.querySelector(".close");

    for (var i = 0; i < facultyOpenFormUpdateButtons.length; i++) {
        facultyOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var facultyPresentID = row.querySelector(".facultyPresentID").value;
            var facultyPresentName = row.querySelector(
                ".facultyPresentName"
            ).value;

            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("facultyOldID").value = facultyPresentID;
            document.getElementById("facultyFormID").value = facultyPresentID;
            document.getElementById("facultyFormName").value =
                facultyPresentName;

            // Mở modal
            facultyModal.style.display = "flex";
        });
    }

    facultyModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        facultyModal.style.display = "none";
    });
});
