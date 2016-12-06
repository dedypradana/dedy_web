<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | CI Bootstrap 3 Configuration
  | -------------------------------------------------------------------------
  | This file lets you define default values to be passed into views
  | when calling MY_Controller's render() function.
  |
  | See example and detailed explanation from:
  | 	/application/config/ci_bootstrap_example.php
 */

$config['ci_bootstrap'] = array(
    // Site name
    'site_name' => 'Dedy Pradana Website',
    // Default page title prefix
    'page_title_prefix' => '',
    // Default page title
    'page_title' => '',
    // Default meta data
    'meta_data' => array(
        'author' => 'Dedy Pradana',
        'description' => 'Visit my website dedy pradana',
        'keywords' => 'Personal Website'
    ),
    // Default scripts to embed at page head or end
    'scripts' => array(
        'head' => array(
            'assets/frontend/vendor/modernizr/modernizr.js',
            'assets/frontend/vendor/jquery/jquery.js',
            'assets/frontend/vendor/jquery.appear/jquery.appear.js',
            'assets/frontend/vendor/jquery.easing/jquery.easing.js',
            'assets/frontend/vendor/jquery-cookie/jquery-cookie.js',
            'assets/frontend/vendor/bootstrap/bootstrap.js',
            'assets/frontend/vendor/common/common.js',
            'assets/frontend/vendor/jquery.validation/jquery.validation.js',
            'assets/frontend/vendor/jquery.stellar/jquery.stellar.js',
            'assets/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js',
            'assets/frontend/vendor/jquery.gmap/jquery.gmap.js',
            'assets/frontend/vendor/isotope/jquery.isotope.js',
            'assets/frontend/vendor/owlcarousel/owl.carousel.js',
            'assets/frontend/vendor/jflickrfeed/jflickrfeed.js',
            'assets/frontend/vendor/magnific-popup/jquery.magnific-popup.js',
            'assets/frontend/vendor/vide/vide.js',
            'assets/frontend/vendor/highlight/highlight.pack.js',
            'assets/frontend/js/theme.js',
            'assets/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js',
            'assets/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js',
            'assets/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.js',
            'assets/frontend/js/views/view.home.js',
            'assets/frontend/js/custom.js',
            'assets/frontend/js/theme.init.js',
        ),
        'foot' => array(
        ),
    ),
    // Default stylesheets to embed at page head
    'stylesheets' => array(
        'screen' => array(
            //Vendor CSS
            'assets/frontend/vendor/bootstrap/bootstrap.css',
            'assets/frontend/vendor/fontawesome/css/font-awesome.css',
            'assets/frontend/vendor/owlcarousel/owl.carousel.min.css',
            'assets/frontend/vendor/owlcarousel/owl.theme.default.min.css',
            'assets/frontend/vendor/magnific-popup/magnific-popup.css',
            //Theme CSS
            'assets/frontend/css/theme.css',
            'assets/frontend/css/theme-elements.css',
            'assets/frontend/css/theme-blog.css',
            'assets/frontend/css/theme-shop.css',
            'assets/frontend/css/theme-animate.css',
            //Current Page CSS
            'assets/frontend/vendor/highlight/styles/atom-one-dark.css',
            'assets/frontend/vendor/rs-plugin/css/settings.css',
            'assets/frontend/vendor/circle-flip-slideshow/css/component.css',
            //Skin CSS
            'assets/frontend/css/skins/default.css',
            'assets/frontend/css/custom.css',
        )
    ),
    // Default CSS class for <body> tag
    'body_class' => '',
    // Sosial Media
    'sosmed' => array(
        'facebook' => 'https://web.facebook.com/dedy.pradana.3',
        'instagram' => 'https://www.instagram.com/dedypradana/',
        'linkedin' => 'https://id.linkedin.com/in/dedy-pradana-8389a33b',
        ),
    // Multilingual settings
    'languages' => array(),
    // Google Analytics User ID
    'ga_id' => '',
    // Menu items
    'menu' => array(
        'home' => array(
            'name' => 'Home',
            'url' => '',
        ),
        'blog' => array(
            'name' => 'Blog',
            'url' => 'blog',
        ),
        'services' => array(
            'name' => 'Services',
            'url' => 'service',
        ),
        'about' => array(
            'name' => 'About',
            'url' => 'about',
        ),
        'portfolio' => array(
            'name' => 'Portfolio',
            'url' => 'portfolio',
        ),
        'contact' => array(
            'name' => 'Contact',
            'url' => 'contact',
        ),
    ),
    // Login page
    'login_url' => '',
    // Restricted pages
    'page_auth' => array(
    ),
    // Email config
    'email' => array(
        'from_email' => '',
        'from_name' => '',
        'subject_prefix' => '',
        // Mailgun HTTP API
        'mailgun_api' => array(
            'domain' => '',
            'private_api_key' => ''
        ),
    ),
    // Debug tools
    'debug' => array(
        'view_data' => FALSE,
        'profiler' => FALSE
    ),
);

/*
  | -------------------------------------------------------------------------
  | Override values from /application/config/config.php
  | -------------------------------------------------------------------------
 */
$config['sess_cookie_name'] = 'ci_session_frontend';