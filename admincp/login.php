<?php
session_start();
include("./Config/config.php");

if (isset($_SESSION['dangnhapadmin'])) {
    header("Location: index.php");
    exit();
}

$thongbao = '';

if (isset($_POST['dangnhap'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == '' || $password == '') {
        $thongbao = 'Vui lòng nhập đầy đủ tài khoản và mật khẩu.';
    } else {
        $sql = "SELECT * FROM tbl_admin WHERE username = ? LIMIT 1";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();

            if ($row) {
                $matkhau_db = $row['password'];
                $hop_le = false;

                // Hỗ trợ cả mật khẩu thường lẫn password_hash
                if (strpos($matkhau_db, '$2y$') === 0 || strpos($matkhau_db, '$2a$') === 0 || strpos($matkhau_db, '$argon2') === 0) {
                    if (password_verify($password, $matkhau_db)) {
                        $hop_le = true;
                    }
                } else {
                    if ($password === $matkhau_db) {
                        $hop_le = true;
                    }
                }

                if ($hop_le) {
                    $_SESSION['dangnhapadmin'] = $row['username'];
                    $_SESSION['id_admin'] = $row['id_admin'];
                    $_SESSION['admin_status'] = $row['admin_status'];

                    header("Location: index.php");
                    exit();
                } else {
                    $thongbao = 'Mật khẩu không đúng.';
                }
            } else {
                $thongbao = 'Tài khoản không tồn tại.';
            }
        } else {
            $thongbao = 'Lỗi truy vấn cơ sở dữ liệu.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập AdminCP</title>
    <link rel="stylesheet" href="Css/login.css">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2>Đăng nhập AdminCP</h2>
            <p class="sub-text">Khu vực quản trị website</p>

            <?php if ($thongbao != '') { ?>
                <div class="alert-error"><?php echo htmlspecialchars($thongbao); ?></div>
            <?php } ?>

            <form action="" method="POST" autocomplete="off">
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username" placeholder="Nhập tài khoản admin">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                </div>

                <button type="submit" name="dangnhap" class="btn-login">Đăng nhập</button>
            </form>

            <div class="login-footer">
                Mysite Admin Panel
            </div>
        </div>
    </div>
</body>

</html>