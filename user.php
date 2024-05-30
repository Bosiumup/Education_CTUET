<?php
session_start();
require "app/configs/database.php";
require "app/configs/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education CTUET</title>

    <!-- logo website -->
    <link rel="icon" href="public/imgs/logo.png" type="image/x-icon" />

    <!-- font icons -->
    <link rel="stylesheet" href="public/icons/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="public/sweetalert2/sweetalert2.min.css">
    <script src="public/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font text-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <!-- Css general link -->
    <link rel="stylesheet" href="public/styles/base.css">
    <link rel="stylesheet" href="public/styles/grid.css">

    <!-- Css link chương trình đào tạo -->
    <link rel="stylesheet" href="public/styles/header.css">
    <link rel="stylesheet" href="public/styles/login_register.css">
    <link rel="stylesheet" href="public/styles/sidebar.css">
    <link rel="stylesheet" href="public/styles/events.css">
    <link rel="stylesheet" href="public/styles/table.css">
    <link rel="stylesheet" href="public/styles/modal.css">
    <link rel="stylesheet" href="public/styles/footer.css">
    <link rel="stylesheet" href="public/styles/profile.css">
</head>
<!-- Header -->


<body style="padding-left: 18rem;">

    <header>
        <?php
            require "app/views/layouts/header.php";
        ?>
    </header>

    <?php 
        $username = $_SESSION["Username"];
        $acc_role = account($conn, $username);
        if($acc_role->num_rows > 0) {
            $row = $acc_role->fetch_assoc();
            if($row["LoaiTaiKhoan"] == "teacher") {
                ?>
    <nav class="container-sideBar-admin">
        <?php
                require "app/views/user/layouts/sidebar.php";
            ?>
    </nav>

    <main class="grid wide education_student">
        <?php
                if (isset($_GET["page"])) {
                    $p = $_GET["page"];
                    require "app/views/user/teacher/" . $p . ".php";
                } 
                else {
                    require "app/views/user/teacher/main.php";
                }
            ?>
    </main>
    <?php
            }
            else {
                ?>
    <nav class="container-sideBar-admin">
        <?php
                require "app/views/user/student/sidebar.php";
            ?>
    </nav>

    <main class="education_student">
        <?php
                if (isset($_GET["page"])) {
                    $p = $_GET["page"];
                    require "app/views/user/student/" . $p . ".php";
                } 
                else {
                    require "app/views/user/student/main.php";
                }
            ?>
    </main>
    <?php
            }
        }
    ?>

    <!-- Footer -->
    <footer>
        <?php
            require "app/views/layouts/footer.php";
        ?>
    </footer>

</body>

</html>