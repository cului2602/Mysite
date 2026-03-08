<?php
session_start();
include("../../admincp/config/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            'tensanpham' => $row['tensanpham'],
            'id' => $row['id_sanpham'],
            'soluong' => 1,
            'giasp' => $row['giasp'],
            'hinhanh' => $row['hinhanh'],
            'masp' => $row['masp']
        );

        // nếu giỏ hàng đã tồn tại
        if (isset($_SESSION['cart'])) {
            $found = false;

            foreach ($_SESSION['cart'] as $key => $cart_item) {
                // nếu sản phẩm đã có trong giỏ thì tăng số lượng
                if ($cart_item['id'] == $id) {
                    $_SESSION['cart'][$key]['soluong'] += 1;
                    $found = true;
                    break;
                }
            }

            // nếu chưa có thì thêm mới vào mảng giỏ hàng
            if (!$found) {
                $_SESSION['cart'][] = $new_product;
            }
        } else {
            // nếu chưa có giỏ hàng thì tạo mới
            $_SESSION['cart'] = array();
            $_SESSION['cart'][] = $new_product;
        }
    }

    header('Location:../../index.php?quanly=giohang');
    exit();
}
