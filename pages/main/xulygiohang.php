<?php
session_start();

// Xóa toàn bộ giỏ hàng và quay về trang danh mục sản phẩm
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location: ../../index.php');
    exit();
}

// Tăng số lượng sản phẩm
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['id'] == $id) {
                $_SESSION['cart'][$key]['soluong'] += 1;
                break;
            }
        }
    }

    header('Location: ../../index.php?quanly=giohang');
    exit();
}

// Giảm số lượng sản phẩm
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['id'] == $id) {
                $_SESSION['cart'][$key]['soluong'] -= 1;

                if ($_SESSION['cart'][$key]['soluong'] <= 0) {
                    unset($_SESSION['cart'][$key]);
                }
                break;
            }
        }

        if (!empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    header('Location: ../../index.php?quanly=giohang');
    exit();
}
