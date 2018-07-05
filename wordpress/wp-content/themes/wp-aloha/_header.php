<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( is_singular( 'product' ) ) { ?>
    <meta name="robots" content="noindex">
  <?php } ?>

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#603cba">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicons/mstile-144x144.png">
  <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
  <noscript>
    <p style="font-size: 30px; text-align: center; color: red; padding: 30px; display: block;">:( NO JAVA SCRIPTS :(</p>
  </noscript>
  <style>
  .lds-ring{display:inline-block;position:fixed;top:0;bottom:0;right:0;left:0;z-index:9990;background:#fff;text-align:center}.lds-ring div{z-index:9999;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;position:absolute;top:50%;left:50%;width:100px;height:100px;margin:-50px;border:6px solid #4facfe;border-radius:50%;-webkit-animation:a 1.2s cubic-bezier(.5,0,.5,1) infinite;-o-animation:a 1.2s cubic-bezier(.5,0,.5,1) infinite;animation:a 1.2s cubic-bezier(.5,0,.5,1) infinite;border-color:#4facfe transparent transparent}.lds-ring div:first-child{-webkit-animation-delay:-.45s;-o-animation-delay:-.45s;animation-delay:-.45s}.lds-ring div:nth-child(2){-webkit-animation-delay:-.3s;-o-animation-delay:-.3s;animation-delay:-.3s}.lds-ring div:nth-child(3){-webkit-animation-delay:-.15s;-o-animation-delay:-.15s;animation-delay:-.15s}@-webkit-keyframes a{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@-o-keyframes a{0%{-o-transform:rotate(0deg);transform:rotate(0deg)}to{-o-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes a{0%{-webkit-transform:rotate(0deg);-o-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);-o-transform:rotate(1turn);transform:rotate(1turn)}}
  </style>
  <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  <!-- wrapper -->
  <div class="wrapper">
    <header role="banner">
      <div class="container-top">

          <nav class="header-nav--top mob-nav">
            <?php wpeHeadNavTop(); ?>
          </nav><!-- /.header-nav--top -->

      </div><!-- /.container-fluid -->


      <div class="container-header">

          <div class="header--logo">
              <?php if ( !is_front_page() && !is_home() ){ ?>
                <a href="<?php echo home_url(); ?>">
              <?php } else { ?>
                <span>
              <?php } ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
              <?php if ( !is_front_page() && !is_home() ){ ?>
                </a>
              <?php } else { ?>
                </span>
              <?php } ?>
          </div><!-- /header--logo -->
          <nav class="header-nav--main mob-nav">
            <?php wpeHeadNav(); ?>
          </nav><!-- /.header-nav--main -->

          <div class="header--phone mob-nav">
            <a href="tel:+380682759512">+38(068) 275-95-12</a>
            <a href="tel:+380992065594">+38(099) 206-55-94</a>
          </div><!-- header--phone -->
          <nav class="header-nav--lang mob-nav">
            <?php wpeLangNav(); ?>
          </nav>
        <div id="hamburger" class="humb-toggle-switch humb-toggle-switch__htx"><span style="color:transparent;">toggle menu</span></div>
      </div><!-- /.container -->
    </header><!-- /header -->
    <section id="main__section" role="main">
