<?php
    // inf account
    function account($conn, $username) {
        $query = "SELECT * FROM account WHERE Username = '$username'";
        return $conn->query($query);
    }
    // check login
    function checkLogin($conn, $username)
    {
        $query = "SELECT * FROM account WHERE Username = '$username'";
        return $conn->query($query);
    }
    // render faculty
    function Faculty($conn)
    {
        $sql = "SELECT * FROM khoa";
        return $conn->query($sql);
    }