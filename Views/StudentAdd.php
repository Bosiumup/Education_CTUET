<form id="add-student-form" action="index.php" method="POST">
    <input type="text" id="student_code" name="student_code" placeholder="MSSV">
    <input type="text" id="class" name="class" placeholder="Lớp">
    <input type="text" id="name" name="name" placeholder="Tên">
    <button class="btn_student" type="submit">Thêm sinh viên</button>
</form>

<script>
$(document).ready(function() {
    $('#add-student-form').on('submit', function(e) {
        e.preventDefault();

        var student_code = $('#student_code').val();
        var class = $('#class').val();
        var name = $('#name').val();

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                student_code: student_code,
                class: class,
                name: name
            },
            success: function(response) {}
        });
    });
});
</script>