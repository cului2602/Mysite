<div id="Main">

    <div class="sidebar">
        <?php
        include("sidebar/sidebar.php");
        ?>
    </div>

    <div class="maincontent">
        <?php
        $tam = $_GET['quanly'] ?? '';

        if ($tam == 'danhmucsanpham') {
            include("main/danhmuc.php");
        } elseif ($tam == 'tatcasp') {
            include("main/tatcasp.php");
        } elseif ($tam == 'sanpham') {
            include("main/chitietsp.php");
        } elseif ($tam == 'giohang') {
            include("main/giohang.php");
        } elseif ($tam == 'tintuc') {
            include("main/tintuc.php");
        } elseif ($tam == 'lienhe') {
            include("main/lienhe.php");
        } elseif ($tam == 'timkiem') {
            include("main/timkiem.php");
        } else {
            include("main/index.php");
        }
        ?>
    </div>

</div>