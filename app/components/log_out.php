<?php
if (isset($_POST['Logout'])) {
    $account = account($conn, $_SESSION["Username"]);
    if ($account->num_rows > 0) {
        $row = $account->fetch_assoc();
        if ($row["LoaiTaiKhoan"] == "admin") {
            session_destroy();
            echo "<script>
                    window.location.href='index.php';
                </script>";
        } 
        else {
            session_destroy();
            echo "<script>
                    window.location.href='index.php';
                </script>";
        }
    }
}