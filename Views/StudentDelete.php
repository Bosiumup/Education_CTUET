<script>
$(document).ready(function() {
    $('#delete-student-form').on('submit', function(e) {
        e.preventDefault();

        var student_code = $('#student_code').val();

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                student_code: student_code,
            },
            success: function(response) {}
        });
    });
});
</script>