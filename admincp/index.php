<?php
session_start();
include("./Config/config.php");

if (!isset($_SESSION['dangnhapadmin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminCP</title>
    <link rel="stylesheet" href="Css/styleAmincp.css">
</head>

<body>
    <div class="admin-wrapper">
        <?php include("modules/header.php"); ?>

        <div class="admin-layout">
            <?php include("modules/menu.php"); ?>

            <main class="admin-main">
                <?php include("modules/main.php"); ?>
            </main>
        </div>

        <?php include("modules/footer.php"); ?>
    </div>
</body>

</html>