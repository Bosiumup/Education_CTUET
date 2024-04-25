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
            success: function(response) {

            }
        });
    });
});
</script>