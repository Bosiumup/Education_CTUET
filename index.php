<?php
require "src/functions.php";
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHƯƠNG TRÌNH ĐÀO TẠO</title>

    <!-- logo website -->
    <link rel="icon" href="src/assets/imgs/logo.png" type="image/x-icon" />

    <!-- font icons -->
    <link rel="stylesheet" href="src/assets/icon/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- Font text-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- Css general link -->
    <link rel="stylesheet" href="src/base.css">
    <link rel="stylesheet" href="src/grid.css">

    <!-- Css link chương trình đào tạo -->
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="stylesheet" href="src/styles/footer.css">
    <link rel="stylesheet" href="src/styles/events.css">
    <link rel="stylesheet" href="src/styles/table.css">
    <link rel="stylesheet" href="src/styles/ex-im.css">
    <link rel="stylesheet" href="src/styles/next_page.css">
    <link rel="stylesheet" href="src/styles/modal.css">
    <link rel="stylesheet" href="src/styles/login.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php
        require "./src/components/pages/header.php";
        ?>
    </header>

    <!-- Chương trình đào tạo -->
    <main class="education-program">
        <?php
        if (isset($_GET["page"])) {
            $p = $_GET["page"]; //pages/$p."php"
            require "src/components/pages/$p";
        } else {
            require "src/components/pages/ctdt.php";
        }
        ?>
    </main>
    <!-- End -->

    <!-- Footer -->
    <footer>
        <?php
        require "./src/components/pages/footer.php";
        ?>
    </footer>

    <!-- Js link -->
    <script src="js/next_page.js"></script>
</body>

</html>