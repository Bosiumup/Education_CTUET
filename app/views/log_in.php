<main class="container-main-login">
    <section class="form-handle">
        <div class="container-handle">
            <div class="title">Đăng nhập</div>
            <div class="content_order">
                <form id="login_form" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Tài khoản</span>
                            <input id="username" name="username" type="text" placeholder="Tài khoản" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Mật khẩu</span>
                            <input id="pass" name="pass" type="password" placeholder="*********" required>
                        </div>
                    </div>
                    <div class="button">
                        <button name="login" type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- Gửi res AJAX tới server -->
<script>
$(document).ready(function() {
    $("#login_form").submit(function(e) {
        e.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            url: 'app/controllers/log_in_controller.php',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                // bên controller chuyển hướng qua 1 trong 2 giao diện: admin or user
            }
        });
    });
});
</script>