<?php
session_start();
include("./Config/config.php");

if (!isset($_SESSION['dangnhapadmin'])) {
    header("Location: login.php");
    exit();
}

$action = $_GET['action'] ?? '';
$role = $_SESSION['admin_role'] ?? '';

function checkAccess($role, $action)
{
    if ($role == 'admin') {
        return true;
    }

    $permissions = [
        'kinhdoanh' => ['quanlydanhmucsanpham', 'quanlysanpham'],
        'truyenthong' => ['quanlydanhmucbaiviet', 'quanlybaiviet']
    ];

    if ($action == '' || $action == 'dashboard') {
        return true;
    }

    return isset($permissions[$role]) && in_array($action, $permissions[$role]);
}

if (!checkAccess($role, $action)) {
?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Không có quyền truy cập</title>
        <link rel="stylesheet" href="Css/styleadmincp.css">
    </head>

    <body>
        <div class="admin-wrapper">
            <?php include("modules/header.php"); ?>
            <div class="admin-layout">
                <?php include("modules/menu.php"); ?>
                <main class="admin-main">
                    <div class="page-title">
                        <h2>Không có quyền truy cập</h2>
                        <p>Tài khoản của bạn không được phép sử dụng chức năng này.</p>
                    </div>
                </main>
            </div>
            <?php include("modules/footer.php"); ?>
        </div>
    </body>

    </html>
<?php
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminCP</title>
    <link rel="stylesheet" href="Css/styleadmincp.css">
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