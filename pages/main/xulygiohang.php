<?php
session_start();

if(isset($_GET['xoatatca'])){
    unset($_SESSION['cart']);
}

header('Location:../../index.php?quanly=giohang');
?>