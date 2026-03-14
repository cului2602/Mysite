<div class="clear"></div>
<div class="mainAdmincp">
    <?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    } elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modules/quanlydanhmucsp/sua.php");
    } elseif ($tam == 'quanlysanpham' && $query == 'them') {
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    } elseif ($tam == 'quanlysanpham' && $query == 'sua') {
        include("modules/quanlysp/sua.php");
    }
    if ($tam == 'quanlybanner' && $query == 'them') {
        include("modules/quanlybanner/them.php");
    } elseif ($tam == 'quanlybanner' && $query == 'lietke') {
        include("modules/quanlybanner/lietke.php");
    } elseif ($tam == 'quanlybanner' && $query == 'sua') {
        include("modules/quanlybanner/sua.php");
    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>