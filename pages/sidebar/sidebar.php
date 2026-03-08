<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<ul class="List_sideBar">
    <?php
    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
    ?>
        <li>
            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']; ?>">
                <?php echo $row_danhmuc['tendanhmuc']; ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>