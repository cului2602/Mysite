<?php
$mysqli = new mysqli("localhost", "root", "", "web_mysqli");

if ($mysqli->connect_errno) {
    echo "Kết nối không thành công " . $mysqli->connect_error;
    exit();
}

$mysqli->set_charset("utf8");
