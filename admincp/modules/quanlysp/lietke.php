<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<p>Liệt kê sản phẩm</p>

<table border="1" width="100%" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Mã SP</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Hình ảnh</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
    ?>

        <tr>

            <td><?php echo $i ?></td>

            <td><?php echo $row['tensanpham'] ?></td>

            <td><?php echo $row['masp'] ?></td>

            <td><?php echo number_format((float)str_replace('.', '', $row['giasp']), 0, ',', '.') ?> đ</td>

            <td><?php echo $row['soluong'] ?></td>

            <td>
                <img src="uploads/<?php echo $row['hinhanh'] ?>" width="120px">
            </td>

            <td><?php echo $row['tomtat'] ?></td>

            <td>
                <?php
                if ($row['tinhtrang'] == 1) {
                    echo "Hiển thị";
                } else {
                    echo "Ẩn";
                }
                ?>
            </td>

            <td>
                <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a> |
                <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
            </td>

        </tr>

    <?php
    }
    ?>

</table>