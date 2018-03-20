<?php get_header(); ?>
<div class="background-home" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/lanvin.jpg')"></div>

<div class="container container-project">
    <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ):

        	while ( $the_query->have_posts() ):
        		$the_query->the_post();
                $imgID = get_field('image_projet');
                $imgUrl = wp_get_attachment_image_src($imgID, '1400x960');
                ?>

                <div class="row">
                    <div class="push-project" style="background-image: url('<?php echo $imgUrl[0] ?>')" data-img="<?php echo $imgUrl[0] ?>">
                        <div class="text-push">
                            <div class="category">
                                <?php echo get_field('category'); ?>
                            </div>
                            <div class="title">
                                <?php echo get_the_title(); ?>
                            </div>
                            <a href="<?php echo get_the_permalink(); ?>" class="link link-project">
                                Voir le projet
                            </a>
                        </div>
                    </div>
                </div>

        	<?php endwhile;
        	wp_reset_postdata();
        endif;
    ?>
</div>
<?php get_footer(); ?>
