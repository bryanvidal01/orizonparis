<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php echo get_bloginfo(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/stylesheets/style.css">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/onglet.jpg" rel="shortcut icon" >
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

      <div class="menu">
          <ul class="links">
              <li>
                  <a href="#">
                      Home
                  </a>
              </li>
              <li>
                  <a href="#">
                      Web
                  </a>
              </li>
              <li>
                  <a href="#">
                      Video
                  </a>
              </li>
              <li>
                  <a href="#">
                      Contact
                  </a>
              </li>
          </ul>
      </div>
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
