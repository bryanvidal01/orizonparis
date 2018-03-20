<?php
    if(!$_GET['isAjax']):
        get_header();
    endif;
    the_post();

    $imgID = get_field('image_projet');
    $imgUrl = wp_get_attachment_image_src($imgID, '1400x960');
?>
<div class="content-single">
    <div class="push-single" style="background-image: url('<?php echo $imgUrl[0]; ?>')">
        <div class="text-project">
            <div class="category">
                <?php echo get_field('category'); ?>
            </div>
            <div class="title">
                <?php echo get_the_title(); ?>
            </div>
        </div>
    </div>
    <div class="container container-single">
        <div class="row">
            <div class="col-sm-12">
                <div class="row content-single">
                    <?php
                    if( have_rows('strates') ):
                        while ( have_rows('strates') ) : the_row();
                        if(get_row_layout() == 'strate_background'):
                            $image = get_sub_field('image');
                            $background = get_sub_field('background');
                            $imageURL = wp_get_attachment_image_src($image, '');
                            ?>
                            <div class="col-sm-12">
                                <div class="strate strate-background" style="background-color: <?php echo $background; ?>">
                                    <img src="<?php echo $imageURL[0]; ?>" alt="">
                                </div>
                            </div>
                        <?php elseif (get_row_layout() == 'strate_image'):
                            $image = get_sub_field('image');
                            $imageURL = wp_get_attachment_image_src($image, '');
                            ?>
                            <div class="col-sm-12">
                                <div class="strate strate-image">
                                    <img src="<?php echo $imageURL[0]; ?>" alt="">
                                </div>
                            </div>
                        <?php endif;
                    endwhile;
                endif;
                ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $nextPost = get_previous_post();
    $nextPostID = $nextPost->ID;

    $imgID = get_field('image_projet', $nextPostID);
    $imgUrl = wp_get_attachment_image_src($imgID, '1400x960');
    ?>

</div>
<a href="<?php echo get_the_permalink($nextPostID); ?>" class="push-single footer-next-post" style="background-image: url('<?php echo $imgUrl[0]; ?>')">
    <div class="text-project">
        <div class="category">
            <?php echo get_field('category', $nextPostID); ?>
        </div>
        <div class="title">
            <?php echo get_the_title($nextPostID); ?>
            <div class="progress-project"></div>
        </div>
    </div>
</a>
<?php
if(!$_GET['isAjax']):
get_footer();
endif;
?>
