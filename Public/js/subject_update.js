document.addEventListener("DOMContentLoaded", function () {
    var SJOpenFormUpdateButtons =
        document.querySelectorAll(".SJOpenFormUpdate");
    var SJModal = document.getElementById("SJMyModal");
    var SJModalCloseButton = SJModal.querySelector(".close");

    for (var i = 0; i < SJOpenFormUpdateButtons.length; i++) {
        SJOpenFormUpdateButtons[i].addEventListener("click", function () {
            // Lấy dữ liệu cần thiết từ hàng hiện tại
            var row = this.closest(".row-d");
            var SJPresentMonHocID = row.querySelector(".SJPresentMonHocID").value;
            var SJPresentID = row.querySelector(".SJPresentID").value;
            var SJPresentName = row.querySelector(".SJPresentName").value;
            var SJPresentHocKy = row.querySelector(".SJPresentHocKy").value;
            var SJPresentTinChi = row.querySelector(".SJPresentTinChi").value;
            var SJPresentLyThuyet = row.querySelector(".SJPresentLyThuyet").value;
            var SJPresentThucHanh = row.querySelector(".SJPresentThucHanh").value;
            var SJOldID = row.querySelector(".SJOldMonHocID").value;





            // Thiết lập giá trị cho các ô input trong modal
            document.getElementById("SJFormselectOption").value =
            SJPresentID;
            document.getElementById("SJFormID").value = SJPresentMonHocID;
            document.getElementById("SJOldID").value = SJOldID;
            document.getElementById("SJFormName").value = SJPresentName;
            document.getElementById("SJFormHocKy").value = SJPresentHocKy;
            document.getElementById("SJFormTinChi").value = SJPresentTinChi;
            document.getElementById("SJFormLyThuyet").value = SJPresentLyThuyet;
            document.getElementById("SJFormThucHanh").value = SJPresentThucHanh;


            // Mở modal
        SJModal.style.display = "flex";

        });


    }

    SJModalCloseButton.addEventListener("click", function () {
        // Tắt modal khi nhấn vào nút close.
        SJModal.style.display = "none";
    });
});