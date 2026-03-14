<?php
$role = $_SESSION['admin_role'] ?? '';
?>

<aside class="admin-sidebar">
    <div class="admin-sidebar-title">MENU QUẢN TRỊ</div>
    <ul>
        <li><a href="index.php">Dashboard</a></li>

        <?php if ($role == 'admin' || $role == 'kinhdoanh') { ?>
            <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
            <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
        <?php } ?>

        <?php if ($role == 'admin' || $role == 'truyenthong') { ?>
            <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
            <li><a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>
        <?php } ?>

        <?php if ($role == 'admin') { ?>
            <li><a href="index.php?action=quanlybanner&query=them">Quản lý banner</a></li>
        <?php } ?>
    </ul>
</aside>