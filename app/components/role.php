<?php
if (!isset($_SESSION["Username"])) {
    header("location: index.php");
}