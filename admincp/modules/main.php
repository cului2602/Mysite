<div class="clear"></div>
<div class="mainAdmincp">
    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $query = isset($_GET['query']) ? $_GET['query'] : '';

    if ($action == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
    } elseif ($action == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modules/quanlydanhmucsp/sua.php");
    } elseif ($action == 'quanlysanpham' && $query == 'them') {
        include("modules/quanlysp/them.php");
    } elseif ($action == 'quanlysanpham' && $query == 'sua') {
        include("modules/quanlysp/sua.php");
    } elseif ($action == 'quanlybanner' && $query == 'them') {
        include("modules/quanlybanner/them.php");
    } elseif ($action == 'quanlybanner' && $query == 'sua') {
        include("modules/quanlybanner/sua.php");
    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>