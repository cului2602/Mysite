<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web phụ kiện điện thoại</title>
  <link rel="stylesheet" href="Css/style.css" />
</head>

<body>
  <div class="warpper">
    <?php
    session_start();
    include("admincp/config/config.php");
    ?>
    <?php
    include("pages/header.php");
    include("pages/menu.php");
    include("pages/banner.php");
    include("pages/main.php");
    include("pages/footer.php");
    ?>
  </div>
</body>

</html>