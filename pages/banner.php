<?php
$sql = "SELECT * FROM tbl_banner WHERE status = 1 ORDER BY sort_order ASC, id_banner DESC";
$query = mysqli_query($mysqli, $sql);

if (!$query) {
    die("Lỗi banner: " . mysqli_error($mysqli));
}

$banners = [];
while ($row = mysqli_fetch_assoc($query)) {
    $banners[] = $row;
}
?>

<?php if (!empty($banners)) { ?>
    <div id="mainBanner"
        class="carousel slide banner-slider"
        data-bs-ride="carousel"
        data-bs-interval="5000"
        data-bs-pause="false"
        data-bs-wrap="true">

        <div class="carousel-indicators">
            <?php foreach ($banners as $key => $row) { ?>
                <button type="button"
                    data-bs-target="#mainBanner"
                    data-bs-slide-to="<?php echo $key; ?>"
                    class="<?php echo ($key == 0) ? 'active' : ''; ?>"
                    <?php echo ($key == 0) ? 'aria-current="true"' : ''; ?>
                    aria-label="Slide <?php echo $key + 1; ?>">
                </button>
            <?php } ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($banners as $key => $row) { ?>
                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                    <img src="admincp/uploads/banner/<?php echo htmlspecialchars($row['image']); ?>"
                        class="d-block w-100 banner-img"
                        alt="<?php echo htmlspecialchars($row['title']); ?>">

                    <div class="carousel-caption banner-caption">
                        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>

                        <div class="banner-buttons">
                            <?php if (!empty($row['btn1_text']) && !empty($row['btn1_link'])) { ?>
                                <a href="<?php echo htmlspecialchars($row['btn1_link']); ?>" class="btn-banner primary-btn">
                                    <?php echo htmlspecialchars($row['btn1_text']); ?>
                                </a>
                            <?php } ?>

                            <?php if (!empty($row['btn2_text']) && !empty($row['btn2_link'])) { ?>
                                <a href="<?php echo htmlspecialchars($row['btn2_link']); ?>" class="btn-banner secondary-btn">
                                    <?php echo htmlspecialchars($row['btn2_text']); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#mainBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#mainBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
<?php } ?>