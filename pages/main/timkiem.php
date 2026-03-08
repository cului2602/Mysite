<?php
$tukhoa = $_POST['tukhoa'] ?? '';

$sql_sp = "SELECT * FROM tbl_sanpham
WHERE (tensanpham LIKE '%" . $tukhoa . "%' OR masp LIKE '%" . $tukhoa . "%')
AND tinhtrang = 1
ORDER BY id_sanpham DESC";

$query_sp = mysqli_query($mysqli, $sql_sp);
?>

<h3>Kết quả tìm kiếm cho: "<?php echo $tukhoa; ?>"</h3>

<h4>Sản phẩm</h4>
<ul class="Product_List">
    <?php while ($row_sp = mysqli_fetch_array($query_sp)) { ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_sp['id_sanpham']; ?>">
                <img src="admincp/uploads/<?php echo $row_sp['hinhanh']; ?>" alt="<?php echo $row_sp['tensanpham']; ?>">
                <p class="product_List">Tên sản phẩm: <?php echo $row_sp['tensanpham']; ?></p>
                <p class="price_List">
                    Giá sản phẩm:
                    <?php echo number_format((float)str_replace('.', '', $row_sp['giasp']), 0, ',', '.'); ?> vnd
                </p>
            </a>
        </li>
    <?php } ?>
</ul>

<div class="clear"></div>