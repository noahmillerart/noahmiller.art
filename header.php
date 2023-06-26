<?php require_once('wp-load.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FRK2LS9J50"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-FRK2LS9J50');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_bloginfo('name'); ?></title>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  </head>
  <body>
    <div class="container-sm p-5" id="header">  <!--Header-->

      <div class="container-fluid text-center" >

        <a href="<?php $siteURL = home_url(); echo $siteURL; ?>/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_NM.png" alt="Noah Miller" class="img-fluid"></a>

        <div class="container d-flex justify-content-center">
          <nav class="navbar navbar-expand">
            <div class="container text-center">
              <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav justify-content-center">
                  <li class="nav-item d-inline <?php if (is_page('comics')) echo 'active'; ?>">
                    <a class="nav-link" aria-current="page" href="<?php $siteURL = home_url(); echo $siteURL; ?>/comics">Comics</a>
                  </li>
                  <li class="nav-item d-inline <?php if (is_page('illustrations')) echo 'active'; ?>">
                    <a class="nav-link" href="<?php $siteURL = home_url(); echo $siteURL; ?>/illustrations">Illustrations</a>
                  </li>
                  <li class="nav-item d-inline <?php if (is_page('thoughts')) echo 'active'; ?>">
                    <a class="nav-link" href="<?php $siteURL = home_url(); echo $siteURL; ?>/thoughts">Thoughts</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>                       

      </div>

    </div> <!--End Header-->