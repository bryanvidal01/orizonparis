<?php
/*
Template Name: Coming soon
*/

get_header();
?>

<div class="container-coming-soon">
    <video width="320" height="240" autoplay muted loop>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/showreel.mp4" type="video/mp4">
    </video>

    <div class="content-comming-soon">
        <div class="logo">
            <h1 class="logo-title">
                Orizon
            </h1>
            <div class="sub-title">
                paris
            </div>
        </div>

        <?php
        $url = "https://facebook.us17.list-manage.com/subscribe/post?u=76b2cc337d2ae894c55248c41&amp;id=9ac6007266";
        $url_json = "https://facebook.us17.list-manage.com/subscribe/post-json?u=76b2cc337d2ae894c55248c41&amp;id=9ac6007266&c=?";
        ?>

        <form class="newsletter-form newsletter clearfix" action="<?php echo $url; ?>" data-json="<?php echo $url_json; ?>" method="post">
            <div class="intro">
                <strong>Our web site is coming !</strong>Subscribe to the newsletter for be the first informed...
            </div>

            <input type="email" value="" name="EMAIL" placeholder="Votre adresse email">
            <button type="submit" name="">
               Submit
            </button>

            <div style="position: absolute; left: -5000px;" aria-hidden="true">
              <input type="text" name="b_76b2cc337d2ae894c55248c41_9ac6007266" tabindex="-1" value="">
            </div>

            <div class="message-error">

            </div>

        </form>


        <div class="social">
            <li>
                <a href="http://facebook.com/orizon.paris/" target="_blank">
                    Facebook
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/orizon.paris/" target="_blank">
                    Instagram
                </a>
            </li>
            <li>
                <a href="mailto:orizon.paris@gmail.com">
                    Contact
                </a>
            </li>
        </div>
    </div>
</div>

<?php get_footer(); ?>
