<main class="container-main-login">
    <section class="form-handle">
        <div class="container-handle">
            <div class="title">Log In</div>
            <div class="content_order">
                <form action="<?php echo "index.php?page=login" ?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input name="username" type="text" placeholder="Tài khoản" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input name="pass" type="password" placeholder="*********" required>
                        </div>
                    </div>
                    <div class="button">
                        <button name="login" type="submit">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>