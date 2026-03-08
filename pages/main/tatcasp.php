<?php
$sql_pro = "SELECT * FROM tbl_sanpham
WHERE tinhtrang = 1
ORDER BY id_sanpham DESC
LIMIT 10";

$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>10 sản phẩm mới nhất</h3>

<ul class="Product_List">
    <?php while ($row_pro = mysqli_fetch_array($query_pro)) { ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>">
                <img src="admincp/uploads/<?php echo $row_pro['hinhanh']; ?>">
                <p class="product_List">Tên sản phẩm: <?php echo $row_pro['tensanpham']; ?></p>
                <p class="price_List">
                    Giá sản phẩm: <?php echo number_format((float)str_replace('.', '', $row_pro['giasp']), 0, ',', '.'); ?> vnd
                </p>
            </a>
        </li>
    <?php } ?>
</ul>

<div class="clear"></div>