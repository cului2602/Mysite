<?php
session_start();
unset($_SESSION['dangnhapadmin']);
unset($_SESSION['id_admin']);
unset($_SESSION['admin_status']);
header("Location: login.php");
exit();
