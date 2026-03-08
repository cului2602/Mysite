<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<div class="menu">
    <ul class="List_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="dropdown">
            <a href="index.php?quanly=tatcasp">Danh mục sản phẩm</a>
            <ul class="submenu">
                <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
                    <li>
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']; ?>">
                            <?php echo $row_danhmuc['tendanhmuc']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
    </ul>
    <form action="index.php?quanly=timkiem" method="POST" class="search-form">
        <input type="text" name="tukhoa" placeholder="Tìm sản phẩm, bài viết...">
        <input type="submit" name="timkiem" value="Tìm">
    </form>
    <div class="clear"></div>
</div>