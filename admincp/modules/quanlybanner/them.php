<h3>Thêm banner</h3>

<form method="POST" action="modules/quanlybanner/xuly.php" enctype="multipart/form-data">

    <p>Tiêu đề</p>
    <input type="text" name="title" style="width:100%;">

    <p>Mô tả</p>
    <textarea name="description" rows="5" style="width:100%;"></textarea>

    <p>Hình ảnh</p>
    <input type="file" name="image">

    <p>Text nút 1</p>
    <input type="text" name="btn1_text" value="Mua ngay" style="width:100%;">

    <p>Link nút 1</p>
    <input type="text" name="btn1_link" value="index.php?quanly=tatcasp" style="width:100%;">

    <p>Text nút 2</p>
    <input type="text" name="btn2_text" value="Xem tin tức" style="width:100%;">

    <p>Link nút 2</p>
    <input type="text" name="btn2_link" value="index.php?quanly=tintuc" style="width:100%;">

    <p>Thứ tự</p>
    <input type="number" name="sort_order" value="1">

    <p>Trạng thái</p>
    <select name="status">
        <option value="1">Hiển thị</option>
        <option value="0">Ẩn</option>
    </select>

    <p style="margin-top:15px;">
        <input type="submit" name="them_banner" value="Thêm banner">
    </p>
</form>