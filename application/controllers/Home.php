<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Frontend', 'fr');
    }
    public function index() {
        $this->mPageTitle = 'Pradana.net';
        $blog_recent = $this->fr->get_blog_recent();
        $this->mViewData['blog_recent'] = $blog_recent;
//        print_r($blog_recent);exit;
        $this->render('home', 'front');
    }

}
