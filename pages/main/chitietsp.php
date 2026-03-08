<?php
$id = $_GET['id'];

$sql_chitiet = "SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
?>

<?php while($row_chitiet = mysqli_fetch_array($query_chitiet)){ ?>

<div class="chitiet_sanpham">

    <div class="hinhanh_sanpham">
        <img src="admincp/uploads/<?php echo $row_chitiet['hinhanh']; ?>" width="100%">
    </div>

    <div class="thongtin_sanpham">
        <h2><?php echo $row_chitiet['tensanpham']; ?></h2>

        <p>
            <strong>Giá:</strong>
            <?php echo number_format((float)str_replace('.', '', $row_chitiet['giasp']),0,',','.'); ?> vnd
        </p>

        <p><strong>Mã sản phẩm:</strong> <?php echo $row_chitiet['masp']; ?></p>

        <p><strong>Số lượng:</strong> <?php echo $row_chitiet['soluong']; ?></p>

        <p><strong>Tóm tắt:</strong></p>
        <p><?php echo $row_chitiet['tomtat']; ?></p>

        <p><strong>Nội dung:</strong></p>
        <p><?php echo $row_chitiet['noidung']; ?></p>
    </div>

</div>

<?php } ?>