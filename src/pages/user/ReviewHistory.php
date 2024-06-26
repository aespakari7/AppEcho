<?php
require_once dirname(__FILE__, 3) . '/components/Header.php';
require_once dirname(__FILE__, 3) . '/features/AppReviews/getReviewsByUserId.php';
require_once dirname(__FILE__, 3) . '/features/AppDetail/getAppDetail.php';
$Reviews=getReviewsByUserId();

    foreach($Reviews as $review){ 
        $app=getAppDetail( $review['app_id'] );
?>
    <div class="AppReviews-box">
        <form action="AppReviews.php" method="GET">
            <!-- アイコン -->
                <img src=" <?php echo $app[0]['image_url'] ?>" alt="icon_url" class="icon">
            <!-- アプリ名 -->
                <span class="AppReviews-number"><?php echo $app[0]['name'] ?></span>
        <span class="AppReviews-point"><i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <?php echo $review['star'] ?>
        </span>

        <input type="hidden" name="appId" id="appId" value="<?php echo $appId ?>">
        <input type="hidden" name="tagId[]" id="tagId[]" value="<?php echo $review['tag_id']?>">
        <button class="AppReviews-tag" style="color: #<?php echo $review['tag_color'] ?>;
        border-color: #<?php echo $review['tag_color'] ?>;">
        <?php echo $review['tag_name'] ?>
        </button>
        </form>
        
        <p class="AppReviews-comment">
            <?php echo nl2br($review['content']) ?>
        </p>
        <div class="AppReviews-date">
            <?php echo $review['post_date'] ?>
        </div>
    </div>
<?php } ?>

<?php
require_once dirname(__FILE__, 3) . '/components/Footer.php';
?>