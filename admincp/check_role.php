<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['dangnhapadmin'])) {
    header("Location: login.php");
    exit();
}

function allowRoles($roles = [])
{
    $currentRole = $_SESSION['admin_role'] ?? '';

    if (!in_array($currentRole, $roles)) {
        echo '
        <div style="
            max-width:700px;
            margin:40px auto;
            background:#fff1f2;
            color:#b91c1c;
            border:1px solid #fecdd3;
            padding:20px;
            border-radius:12px;
            font-family:Arial;
            text-align:center;
        ">
            <h3>Bạn không có quyền truy cập chức năng này</h3>
            <p>Vui lòng quay lại đúng khu vực được phân quyền.</p>
        </div>';
        exit();
    }
}
