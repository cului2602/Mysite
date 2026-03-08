<?php
include('../../config/config.php');
$id_danhmuc = $_POST['danhmuc'];
$tensanpham = $_POST['tensanpham'] ?? '';
$masp = $_POST['masp'] ?? '';
$giasp = $_POST['giasp'] ?? '';
$soluong = $_POST['soluong'] ?? '';
$tomtat = $_POST['tomtat'] ?? '';
$noidung = $_POST['noidung'] ?? '';
$tinhtrang = $_POST['tinhtrang'] ?? '';
$id_danhmuc = $_POST['danhmuc'];
$hinhanh = $_FILES['hinhanh']['name'] ?? '';
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'] ?? '';
// Them san pham 
if (isset($_POST['themsanpham'])) {

    $tenfile = '';

    if (!empty($hinhanh)) {
        $tenfile = time() . '_' . basename($hinhanh);
        move_uploaded_file($hinhanh_tmp, '../../uploads/' . $tenfile);
    }

    $sql_them = "INSERT INTO tbl_sanpham
    (tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc)
    VALUES
    ('".$tensanpham."', '".$masp."', '".$giasp."', '".$soluong."', '".$tenfile."', '".$tomtat."', '".$noidung."', '".$tinhtrang."', '".$id_danhmuc."')";

    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {

    $id = $_GET['idsanpham'];

    if ($hinhanh != '') {

        // lấy ảnh cũ để xoá
        $sql_lay_anh = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
        $query_lay_anh = mysqli_query($mysqli, $sql_lay_anh);
        $row = mysqli_fetch_array($query_lay_anh);

        if ($row['hinhanh'] != '' && file_exists('../../uploads/' . $row['hinhanh'])) {
            unlink('../../uploads/' . $row['hinhanh']);
        }

        $tenfile = time() . '_' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, '../../uploads/' . $tenfile);

        $sql_update = "UPDATE tbl_sanpham SET
        
        id_danhmuc='".$id_danhmuc."'
        tensanpham='" . $tensanpham . "',
        masp='" . $masp . "',
        giasp='" . $giasp . "',
        soluong='" . $soluong . "',
        hinhanh='" . $tenfile . "',
        tomtat='" . $tomtat . "',
        noidung='" . $noidung . "',
        tinhtrang='" . $tinhtrang . "',
        WHERE id_sanpham='" . $id . "'";
    } else {

        $sql_update = "UPDATE tbl_sanpham SET
        tensanpham='" . $tensanpham . "',
        masp='" . $masp . "',
        giasp='" . $giasp . "',
        soluong='" . $soluong . "',
        tomtat='" . $tomtat . "',
        noidung='" . $noidung . "',
        tinhtrang='" . $tinhtrang . "',
        id_danhmuc='".$id_danhmuc."',
        WHERE id_sanpham='" . $id . "'";
    }

    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {
    $id = $_GET['idsanpham'];

    $sql_lay_anh = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query_lay_anh = mysqli_query($mysqli, $sql_lay_anh);
    $row = mysqli_fetch_array($query_lay_anh);

    if ($row['hinhanh'] != '' && file_exists('../../uploads/' . $row['hinhanh'])) {
        unlink('../../uploads/' . $row['hinhanh']);
    }

    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);

    header('Location:../../index.php?action=quanlysanpham&query=them');
}
