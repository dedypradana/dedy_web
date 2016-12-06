<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About
 */
class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Frontend', 'fr');
    }
    public function index() {
        $portfolio = $this->fr->get_related();
        $about = $this->fr->get_about();
        $this->mViewData['portfolio'] = $portfolio;
        $this->mViewData['about'] = $about;
        $this->render('about', 'default');
    }

}
