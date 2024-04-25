<?php
session_start();
require "configs/conn.php";
require "configs/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinh viên CTUET</title>

    <!-- logo website -->
    <link rel="icon" href="Public/imgs/logo.png" type="image/x-icon" />

    <!-- font icons -->
    <link rel="stylesheet" href="Public/icon/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="Public/sweetalert2/sweetalert2.min.css">
    <script src="Public/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font text-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <!-- Css general link -->
    <link rel="stylesheet" href="Public/styles/base.css">
    <link rel="stylesheet" href="Public/styles/grid.css">

    <!-- Css link chương trình đào tạo -->
    <link rel="stylesheet" href="Public/styles/header.css">
    <link rel="stylesheet" href="Public/styles/footer.css">
    <link rel="stylesheet" href="Public/styles/events.css">
    <link rel="stylesheet" href="Public/styles/table.css">
    <link rel="stylesheet" href="Public/styles/modal.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php
        require "Views/header.php";
        ?>
    </header>

    <!-- Thêm sinh viên -->
    <main class="education_student">
        <?php
            require "Views/main_students.php";
        ?>
    </main>
    <!-- End -->

    <!-- Footer -->
    <footer>
        <?php
        require "Views/footer.php";
        ?>
    </footer>

</body>

</html>