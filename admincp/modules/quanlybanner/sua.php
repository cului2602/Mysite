<?php
$id = isset($_GET['id_banner']) ? (int)$_GET['id_banner'] : 0;

if ($id <= 0) {
    die('Thiếu ID banner');
}

$sql = "SELECT * FROM tbl_banner WHERE id_banner='$id' LIMIT 1";
$query = mysqli_query($mysqli, $sql);

if (!$query) {
    die('Lỗi SQL: ' . mysqli_error($mysqli));
}

$row = mysqli_fetch_assoc($query);

if (!$row) {
    die('Không tìm thấy banner');
}
?>

<h3>Sửa banner</h3>

<form method="POST" action="modules/quanlybanner/xuly.php?id_banner=<?php echo $row['id_banner']; ?>" enctype="multipart/form-data">

    <p>Tiêu đề</p>
    <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" style="width:100%;">

    <p>Mô tả</p>
    <textarea name="description" rows="5" style="width:100%;"><?php echo htmlspecialchars($row['description']); ?></textarea>

    <p>Ảnh banner mới</p>
    <input type="file" name="image">
    <br><br>

    <?php if (!empty($row['image'])) { ?>
        <img src="uploads/banner/<?php echo htmlspecialchars($row['image']); ?>" width="220">
    <?php } ?>

    <p>Text nút 1</p>
    <input type="text" name="btn1_text" value="<?php echo htmlspecialchars($row['btn1_text']); ?>" style="width:100%;">

    <p>Link nút 1</p>
    <input type="text" name="btn1_link" value="<?php echo htmlspecialchars($row['btn1_link']); ?>" style="width:100%;">

    <p>Text nút 2</p>
    <input type="text" name="btn2_text" value="<?php echo htmlspecialchars($row['btn2_text']); ?>" style="width:100%;">

    <p>Link nút 2</p>
    <input type="text" name="btn2_link" value="<?php echo htmlspecialchars($row['btn2_link']); ?>" style="width:100%;">

    <p>Thứ tự</p>
    <input type="number" name="sort_order" value="<?php echo (int)$row['sort_order']; ?>">

    <p>Trạng thái</p>
    <select name="status">
        <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Hiển thị</option>
        <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Ẩn</option>
    </select>

    <p style="margin-top:15px;">
        <input type="submit" name="sua_banner" value="Cập nhật banner">
    </p>
</form>