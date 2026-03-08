<h3>Giỏ hàng</h3>

<?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
?>

    <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Mã SP</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>

        <?php
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = (float)str_replace('.', '', $cart_item['giasp']) * $cart_item['soluong'];
            $tongtien += $thanhtien;
        ?>
            <tr>
                <td><?php echo $cart_item['id']; ?></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td><img src="admincp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="100"></td>
                <td><?php echo $cart_item['masp']; ?></td>
                <td><?php echo $cart_item['soluong']; ?></td>
                <td><?php echo number_format((float)str_replace('.', '', $cart_item['giasp']), 0, ',', '.'); ?> vnd</td>
                <td><?php echo number_format($thanhtien, 0, ',', '.'); ?> vnd</td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7">

                <p>Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.'); ?> vnd</p>

                <a href="pages/main/xulygiohang.php?xoatatca=1">
                    <button style="padding:8px 15px;background:red;color:white;border:none;cursor:pointer;">
                        Xóa giỏ hàng
                    </button>
                </a>

            </td>
        </tr>
    </table>

<?php
} else {
    echo '<p>Hiện tại giỏ hàng trống.</p>';
}
?>