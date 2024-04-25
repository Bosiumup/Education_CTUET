<script>
$(document).ready(function() {
    $(".update-student-form").click(function() {
        // Lấy dữ liệu cần thiết từ hàng hiện tại
        var $row = $(this).closest('.row-d');
        var old_class = $row.find('.class').val();
        var old_student_code = $row.find('.student_code').val();
        var old_name = $row.find('.name').val();

        // Thiết lập giá trị cho các ô input trong modal
        $("#edit_class").val(old_class);
        $("#old_student_code").val(old_student_code);
        $("#edit_student_code").val(old_student_code);
        $("#edit_name").val(old_name);

        // Mở modal
        $("#myModal").css("display", "flex");
    });

    $("#editForm").click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        // Lấy dữ liệu mới từ form.
        var new_class = $('#edit_class').val();
        var new_name = $('#edit_name').val();
        var new_student_code = $('#edit_student_code').val();

        // AJAX call để cập nhật dữ liệu.
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                student_code: new_student_code,
                class: new_class,
                name: new_name,
            },
            success: function(response) {}
        });

        // Tắt modal.
        $("#myModal").css("display", "none");
    });

    $("#myModal .close").click(function() {
        // Tắt modal khi nhấn vào nút close.
        $("#myModal").css("display", "none");
    });
});
</script>