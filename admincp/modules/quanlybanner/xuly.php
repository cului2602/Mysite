<?php
include('../../Config/config.php');

$title       = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$btn1_text   = $_POST['btn1_text'] ?? '';
$btn1_link   = $_POST['btn1_link'] ?? '';
$btn2_text   = $_POST['btn2_text'] ?? '';
$btn2_link   = $_POST['btn2_link'] ?? '';
$sort_order  = $_POST['sort_order'] ?? 1;
$status      = $_POST['status'] ?? 1;

$image_name = $_FILES['image']['name'] ?? '';
$image_tmp  = $_FILES['image']['tmp_name'] ?? '';

$upload_dir = '../../uploads/banner/';

// tự tạo thư mục nếu chưa có
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (isset($_POST['them_banner'])) {

    $file_name = '';

    if (!empty($image_name)) {
        $file_name = time() . '_' . basename($image_name);
        move_uploaded_file($image_tmp, $upload_dir . $file_name);
    }

    $sql_them = "INSERT INTO tbl_banner(title, description, image, btn1_text, btn1_link, btn2_text, btn2_link, sort_order, status)
                 VALUES('$title', '$description', '$file_name', '$btn1_text', '$btn1_link', '$btn2_text', '$btn2_link', '$sort_order', '$status')";

    mysqli_query($mysqli, $sql_them) or die('Lỗi thêm banner: ' . mysqli_error($mysqli));

    header('Location:../../index.php?action=quanlybanner&query=lietke');
    exit();
}

if (isset($_POST['sua_banner'])) {

    $id = isset($_GET['id_banner']) ? (int)$_GET['id_banner'] : 0;

    if ($id <= 0) {
        die('Thiếu ID banner');
    }

    if (!empty($image_name)) {
        $file_name = time() . '_' . basename($image_name);
        move_uploaded_file($image_tmp, $upload_dir . $file_name);

        $sql_sua = "UPDATE tbl_banner 
                    SET title='$title',
                        description='$description',
                        image='$file_name',
                        btn1_text='$btn1_text',
                        btn1_link='$btn1_link',
                        btn2_text='$btn2_text',
                        btn2_link='$btn2_link',
                        sort_order='$sort_order',
                        status='$status'
                    WHERE id_banner='$id'";
    } else {
        $sql_sua = "UPDATE tbl_banner 
                    SET title='$title',
                        description='$description',
                        btn1_text='$btn1_text',
                        btn1_link='$btn1_link',
                        btn2_text='$btn2_text',
                        btn2_link='$btn2_link',
                        sort_order='$sort_order',
                        status='$status'
                    WHERE id_banner='$id'";
    }

    mysqli_query($mysqli, $sql_sua) or die('Lỗi sửa banner: ' . mysqli_error($mysqli));

    header('Location:../../index.php?action=quanlybanner&query=lietke');
    exit();
}

if (isset($_GET['id_banner'])) {
    $id = (int)$_GET['id_banner'];

    if ($id > 0) {
        $sql_xoa = "DELETE FROM tbl_banner WHERE id_banner='$id'";
        mysqli_query($mysqli, $sql_xoa) or die('Lỗi xóa banner: ' . mysqli_error($mysqli));
    }

    header('Location:../../index.php?action=quanlybanner&query=lietke');
    exit();
}
