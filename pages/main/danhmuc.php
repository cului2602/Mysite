<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$lietke = 8;

if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}

$begin = ($page * $lietke) - $lietke;

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='" . $id . "' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);

$sql_pro = "SELECT * FROM tbl_sanpham 
WHERE id_danhmuc='" . $id . "' AND tinhtrang=1
ORDER BY id_sanpham DESC
LIMIT $begin,$lietke";

$query_pro = mysqli_query($mysqli, $sql_pro);

$sql_trang = "SELECT * FROM tbl_sanpham 
WHERE id_danhmuc='" . $id . "' AND tinhtrang=1";
$query_trang = mysqli_query($mysqli, $sql_trang);
$row_count = mysqli_num_rows($query_trang);
$trang = ceil($row_count / $lietke);
?>

<?php while ($row_title = mysqli_fetch_array($query_cate)) { ?>
    <h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']; ?></h3>
<?php } ?>

<div class="content-wrap">
    <ul class="Product_List">
        <?php while ($row_pro = mysqli_fetch_array($query_pro)) { ?>
            <li>
                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>">
                    <img src="admincp/uploads/<?php echo $row_pro['hinhanh']; ?>" alt="<?php echo $row_pro['tensanpham']; ?>">

                    <p class="product_list">
                        Tên sản phẩm: <?php echo $row_pro['tensanpham']; ?>
                    </p>

                    <p class="price_list">
                        Giá sản phẩm:
                        <?php echo number_format((float)str_replace('.', '', $row_pro['giasp']), 0, ',', '.'); ?> vnd
                    </p>
                </a>
            </li>
        <?php } ?>
    </ul>

    <ul class="list_trang">
        <?php for ($i = 1; $i <= $trang; $i++) { ?>
            <li <?php if ($i == $page) {
                    echo 'style="background:#ddd;"';
                } ?>>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $id; ?>&trang=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="clear"></div>