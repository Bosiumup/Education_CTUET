<script>
$(document).ready(function() {
    $(".facultyOpenFormUpdate").click(function() {
        // Lấy dữ liệu cần thiết từ hàng hiện tại
        var $row = $(this).closest('.row-d');
        var facultyPresentID = $row.find('.facultyPresentID').val();
        var facultyPresentName = $row.find('.facultyPresentName').val();

        // Thiết lập giá trị cho các ô input trong modal
        $("#facultyOldID").val(facultyPresentID);
        $("#facultyFormID").val(facultyPresentID);
        $("#facultyFormName").val(facultyPresentName);

        // Mở modal
        $("#facultyMyModal").css("display", "flex");
    });

    $("#facultyMyModal .close").click(function() {
        // Tắt modal khi nhấn vào nút close.
        $("#facultyMyModal").css("display", "none");
    });
});
</script>