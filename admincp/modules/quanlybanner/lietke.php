<?php
$sql = "SELECT * FROM tbl_banner ORDER BY sort_order ASC, id_banner DESC";
$query = mysqli_query($mysqli, $sql);

if (!$query) {
    die("Lỗi SQL: " . mysqli_error($mysqli));
}
?>

<h3>Liệt kê banner</h3>

<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Hình ảnh</th>
        <th>Nút 1</th>
        <th>Nút 2</th>
        <th>Thứ tự</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?php echo $row['id_banner']; ?></td>

            <td><?php echo htmlspecialchars($row['title']); ?></td>

            <td>
                <?php if (!empty($row['image']) && file_exists('uploads/banner/' . $row['image'])) { ?>
                    <img src="uploads/banner/<?php echo htmlspecialchars($row['image']); ?>" width="180">
                <?php } else { ?>
                    Không có ảnh
                    <br>
                    <small><?php echo htmlspecialchars($row['image']); ?></small>
                <?php } ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['btn1_text']); ?>
                <br>
                <small><?php echo htmlspecialchars($row['btn1_link']); ?></small>
            </td>

            <td>
                <?php echo htmlspecialchars($row['btn2_text']); ?>
                <br>
                <small><?php echo htmlspecialchars($row['btn2_link']); ?></small>
            </td>

            <td><?php echo $row['sort_order']; ?></td>

            <td><?php echo ($row['status'] == 1) ? 'Hiển thị' : 'Ẩn'; ?></td>

            <td>
                <a href="modules/quanlybanner/xuly.php?id_banner=<?php echo $row['id_banner']; ?>">Xóa</a> |
                <a href="?action=quanlybanner&query=sua&id_banner=<?php echo $row['id_banner']; ?>">Sửa</a>
            </td>
        </tr>
    <?php } ?>
</table>