<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "web_mysqli", 3306);

// Check connection
if ($mysqli->connect_errno) {
    echo "Kết nối không thành công " . $mysqli->connect_error;
    exit();
}
