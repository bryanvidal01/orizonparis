<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/stylesheets/style.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
      <div class="header">
          <div class="logo">
              <h1 class="logo-title">
                  Orizon
              </h1>
              <div class="sub-title">
                  paris
              </div>
          </div>

          <div class="navigation">
              navigation
          </div>
      </div>
