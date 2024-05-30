<?php
require "app/controllers/teacher_controller.php";
$epController = new Teacher_Controller();
$epController->ChangePass();

?>
<div class="change-password-container">
    <h2>Đổi Mật Khẩu</h2>
    <form method="POST" id="change-password-form">
        <!-- <input type="hidden" name="page" value="changePass"> -->
        <div class="form-group">
            <label for="current-password">Mật Khẩu Hiện Tại:</label>
            <input type="password" id="current-password" name="current-password" required>
        </div>
        <div class="form-group">
            <label for="new-password">Mật Khẩu Mới:</label>
            <input type="password" id="new-password" name="new-password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Xác Nhận Mật Khẩu:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button name="changePass" class="back_btn" type="submit">Đổi Mật Khẩu</button>
    </form>
    <div id="password-change-message" class="message"></div>
</div>
<style>
    .change-password-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .change-password-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .back_btn {
        float: right;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 600;
        background-color: var(--primary-color);
        color: #fff;
        border: none;
        outline: none;
        padding: 10px 20px;
        margin-left: 10px;
        border-radius: 10px;
        transition: all ease 0.1s;
        box-shadow: 0px 5px 0px 0px #9bbafe;
    }

    .back_btn a {
        color: #fff;
    }

    .back_btn:hover {
        opacity: 0.9;
        cursor: pointer;
    }

    .back_btn:active {
        transform: translateY(5px);
        box-shadow: 0px 0px 0px 0px #9badfe;
    }

    .message {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
    }
</style>