<header class="admin-header">
    <div class="admin-header-left">
        <h1>Trang quản trị website</h1>
        <p>Quản lý nội dung, sản phẩm, bài viết và banner</p>
    </div>

    <div class="admin-header-right">
        <span>
            Xin chào:
            <strong><?php echo htmlspecialchars($_SESSION['dangnhapadmin']); ?></strong>
            (<?php echo htmlspecialchars($_SESSION['admin_role'] ?? ''); ?>)
        </span>
        <a href="logout.php" class="btn-logout">Đăng xuất</a>
    </div>
</header>