<script>
$(document).ready(function() {
    $(".update-student-form").click(function() {
        // Hiển thị modal lên.
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