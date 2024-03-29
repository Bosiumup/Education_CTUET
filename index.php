<?php
require "functions.php";
require "conn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHƯƠNG TRÌNH ĐÀO TẠO</title>

    <!-- logo website -->
    <link rel="icon" href="assets/imgs/logo.png" type="image/x-icon" />

    <!-- font icons -->
    <link rel="stylesheet" href="assets/icon/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="./sweetalert2/sweetalert2.min.css">
    <script src="./sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Font text-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- Css general link -->
    <link rel="stylesheet" href="styles/base.css">
    <link rel="stylesheet" href="styles/grid.css">

    <!-- Css link chương trình đào tạo -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/events.css">
    <link rel="stylesheet" href="styles/table.css">
    <link rel="stylesheet" href="styles/ex-im.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php
        require "pages/header.php";
        ?>
    </header>

    <!-- Chương trình đào tạo -->
    <main class="education-program">
        <?php
        if (isset($_GET["page"])) {
            $p = $_GET["page"]; //pages/$p."php"
            require "pages/$p";
        } else {
            require "pages/main.php";
        }
        ?>
    </main>
    <!-- End -->

    <!-- Footer -->
    <footer>
        <?php
        require "pages/footer.php";
        ?>
    </footer>

</body>

</html>